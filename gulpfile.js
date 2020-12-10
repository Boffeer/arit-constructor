const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const plumber = require('gulp-plumber');
const pug = require('gulp-pug');
const pugLinter = require('gulp-pug-linter');
const htmlValidator = require('gulp-w3c-html-validator');
// const sass = require('gulp-sass');
    // sass.compiler = require('node-sass');
const cleanCSS = require('gulp-clean-css');
const shorthand = require('gulp-shorthand');
const eslint = require('gulp-eslint');
const babel = require('gulp-babel');
const terser = require('gulp-terser');
const rename = require('gulp-rename');

const image = require('gulp-image');
const responsive = require('gulp-responsive');

const sync = require('browser-sync');

var gutil = require('gulp-util');
var ftp = require('gulp-ftp');

const { convertAllFonts } = require('@hayes0724/web-font-converter');

const postcss = require('gulp-postcss');

const colors = require('colors');
const del = require('del');

const svgo = require('gulp-svgo');

// const browserSync = require('browser-sync').create();

// const styles = require('./gulp/tasks/styles.js');
// module.exports.styles = gulp.series(styles)

// const pug2html = require('./gulp/tasks/pug2html.js');
// module.exports.pug = gulp.series(pug2html)


// const scripts = require('./gulp/tasks/scripts.js');
// module.exports.scripts = gulp.series(scripts)



// ==== PAGERES ====

const Pageres = require('pageres');
 
const screens = () =>{
	(async () => {
	    await new Pageres({delay: 2})
	        .src('https://yandex.ru', ['480x320', '1024x768', 'iphone 5s'], {crop: true})
	        .src('https://yandex.ru', ['1280x1024', '1920x1080'])
	        .src('data:text/html,<h1>Awesome!</h1>', ['1024x768'])
	        .dest(__dirname)
	        .run();
	        
	    console.log('Finished generating screenshots!');
	})();
}
exports.screens = screens;
// ---- pageres ----





// ==== PUG ====
const pug2html = () => {
	return gulp.src('dev/pages/*.pug')
		.pipe(plumber())
		.pipe(pugLinter({ reporter: 'default' }))
		.pipe(pug())
		.pipe(htmlValidator())
		.pipe(gulp.dest('build'))
		.pipe(sync.stream());

}

exports.pug2html = pug2html;
// ---- pug ----



// ==== CSS ====
// const autoprefixer = require('gulp-autoprefixer');
const autoprefixer = require('autoprefixer');
const cssnext = require('cssnext');
const precss = require('precss');
const cssnano = require('cssnano');
const fs = require("fs");
const cssImport = require("postcss-import");
const postcssFixes = require('postcss-fixes');
// const andImport = fs.readFileSync("./dev/styles/style.css", "utf8");
const doiuse = require('doiuse');
const animate = require('postcss-animation');
const postcssCustomMedia = require('postcss-custom-media');
const vhFix = require('postcss-viewport-height-correction');
const gap = require('postcss-gap');
const negativePadding = require('postcss-negative-padding');
const quantityQueries = require('postcss-quantity-queries');
const defineProperty = require('postcss-define-property');
// const uncss = require('postcss-uncss');


const stylelint = require("stylelint");
const presetEnv = require("postcss-preset-env");
const reporter = require("postcss-reporter")({ clearReportedMessages: true });


const styles = () => {
	const plugins = [ 
		cssImport,
		defineProperty,
		autoprefixer({
			cascade: true,
			flexbox: true,
			grid: "autoplace",
		}), 
		postcssFixes,
		animate,
		postcssCustomMedia,
		gap,
		negativePadding,
		vhFix,
		cssnext, 
		precss,
		stylelint({}),
		// presetEnv,
		// reporter,
		cssnano({preset: 'default',}),
		// uncss({
		// 	html: ['build/*.html'],
		// 	ignore: ['.ignore']
		// }),
		doiuse({
			browsers: [
			    "> .5% and last 1 versions",
			    "not dead",
			    "not OperaMini all",
			    "not IE 11",
			    "Edge >= 12"
			],
			ignore: [
				'background', 
				'appearance',
				'will-change',
				'object-fit',],
			onFeatureUsage: (info) => {
			    const selector = info.usage.parent.selector;
			    const property = `${info.usage.prop}: ${info.usage.value}`;

			    let status = info.featureData.caniuseData.status.toUpperCase();

			    if (info.featureData.missing) {
			        status = 'NOT SUPPORTED'.red;
			    } else if (info.featureData.partial) {
			        status = 'PARTIAL SUPPORT'.yellow;
			    } else if (info.featureData.partial == 'WD'){
			        status = 'working draft'.yellow;
			    }
			    // console.log(info.featureData)
			    console.log(`\n${status}:\n\n    ${selector} {\n        ${property};\n    }\n`);
			},
		}),
	];

	return gulp.src('./dev/styles/*.css')
		.pipe(sourcemaps.init())
		.pipe(postcss(plugins))
		.pipe(shorthand())
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('./build/css'))
		.pipe(sync.stream());
}

exports.styles = styles;
// ---- css ----





// ==== JS ====
const concat = require('gulp-concat');
const scripts = () => {
	// return gulp.src('dev/js/main.js')
	return gulp.src('dev/js/*.js')
		// .pipe(eslint())
		// .pipe(eslint.format())
		.pipe(sourcemaps.init())
		.pipe(concat('main.js'))
		.pipe(babel({
			presets: ['@babel/env']
		}))
		.pipe(terser())
		.pipe(sourcemaps.write())
		.pipe(rename({ suffix: '.min'}))
		.pipe(gulp.dest('build/js'))
		.pipe(sync.stream());

}

exports.scripts = scripts;
// ---- js ----





// ==== IMG ====
const svgDev = () => {
	return gulp.src('dev/img/*.svg')
        .pipe(svgo())
        .pipe(gulp.dest('build/img'));
}
exports.svgDev = svgDev;




const imgDev = () => {
	// add webp, copy just as several pics with differernt names
	return gulp.src([
		'dev/img/**/*'
	], {
		base: 'dev'
	})
	.pipe(gulp.dest('build/'))
}

exports.imgDev = imgDev;


const imgMultiply = () => {
	return gulp.src('dev/img/**/*.{png,jpg,jpeg}')
		.pipe(
			responsive({
				'**/*.png':[
					{ progressive: true, },
					{ format: 'webp', },
					{
						withoutEnlargement: false,
						width: '200%',
						rename: { suffix: "@2" },
					},
					{
						withoutEnlargement: false,
						width: '200%',
						format: 'webp',
						rename: { suffix: "@2" },
					},
				],				
				'**/*.jpg':[
					{ progressive: true, },
					{ format: 'webp', },
					{
						withoutEnlargement: false,
						width: '200%',
						rename: { suffix: "@2" },
					},
					{
						withoutEnlargement: false,
						width: '200%',
						format: 'webp',
						rename: { suffix: "@2" },
					},
				],

			})
		)
		.pipe(gulp.dest('tempMultipliedImages/img'));
}

exports.imgMultiply = imgMultiply;




const imgBuild = () => {
	return gulp.src('tempMultipliedImages/img/**/*')
		.pipe(image({
			pngquant: true,
			optipng: true,
			zopflipng: true,
			jpegRecompress: false,
			mozjpeg: true,
			gifsicle: true,
			svgo: true,
			concurrent: 10,
			quiet: false
		}))
		// .pipe(gulp.dest('build-test/img'))
		.pipe(gulp.dest('build/img'))
	// преобразование в вебп, разные размеры картинок
}

exports.imgBuild = imgBuild;
// ---- img ----


// ==== FTP
const loadFtp = () => {
	return gulp.src('build/*')
	        .pipe(ftp({
	            host: 'website.com',
	            user: 'johndoe',
	            pass: '1234'
	        }))
	        // you need to have some kind of stream after gulp-ftp to make sure it's flushed
	        // this can be a gulp plugin, gulp.dest, or any kind of stream
	        // here we use a passthrough stream
	        .pipe(gutil.noop());
}
exports.loadFtp = loadFtp;
// ---- ftp




// ==== FONTS ====
const convertFonts = () => {
	return gulp.src('dev/fonts/*')
		.pipe(convertAllFonts({
		    pathIn: './dev/fonts',
		    pathOut: './build/fonts/',
		    outputFormats: ['.woff', '.woff2'],
		    inputFormats: ['.ttf', '.otf'],
		    debug: false
		}))
		.pipe(gulp.dest('build/fonts'))
		.pipe(sync.stream({
			once: true
		}));	
}
// This will convert all ttf fonts to both woff and woff2
exports.convertFonts = convertFonts;

// ---- fonts

const clean = async () => {
	const delBuild = await del(['./build'])
}
exports.clean = clean;


// ==== COPY ====
		// 'dev/img/**/*',
const copy = () => {
	return gulp.src([
		'dev/fonts/**/*.woff',
		'dev/fonts/**/*.woff2',
	], {
		base: 'dev'
	})
	.pipe(gulp.dest('build'))
	.pipe(sync.stream({
		once: true
	}));
}

exports.copy = copy;
// ---- copy ----



// ==== SERVER ====
const server = () => {
	sync.init({
		ui: false,
		notify: false,
		server: {
			baseDir: 'build'
		}
	});
}

exports.server = server;
// ---- server ----



// ==== WATCH ====
const watch = () => {
	gulp.watch('dev/pages/**/*.pug', gulp.series(pug2html));
	gulp.watch('dev/styles/**/*.css', gulp.series(styles));
	gulp.watch('dev/js/*.js', gulp.series(scripts));

	gulp.watch('dev/img/**/*', gulp.series(imgDev));


	gulp.watch('dev/fonts/**/*.{ttf, oft}', gulp.series(convertFonts));
	gulp.watch('dev/fonts/**/*.{woff, woff2}', gulp.series(copy));
}

exports.watch = watch;
// ---- watch ---



// ==== DEAFULT ====
exports.default = gulp.series(
	gulp.parallel(
		pug2html,
		styles,
		scripts,
		copy,
		imgDev
	),
	// 'paths',
	gulp.parallel(
		watch,
		server
	)
);
// ---- default



// ==== BUILD ====
const build= gulp.series(
	gulp.parallel(
		pug2html,
		styles,
		scripts,
		imgMultiply,
		imgBuild
	)
);

exports.build = build;
// ---- build ----




// ==== First run
const first= gulp.series(
	gulp.parallel(
		convertFonts
	)
);





// // HTML
// const html = () => {
// 	return gulp.src('dev/*.html')
// 		.pipe(htmlmin({
// 			removeComments: true,
// 			collapseWhitespaces: true,
// 		}))
// 		.pipe(gulp.dest('build'))
// 		.pipe(sync.stream());
// }

// exports.html = html;



// // Static server
// gulp.task('browser-sync', function() {
//     browserSync.init({
//         server: {
//             baseDir: "build/"
//         }
//     });
// });





// exports.default = sass;
// exports.default = series(sass, browserSync);