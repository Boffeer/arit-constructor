if (document.querySelector(".pop-video")) {
  poppa({
    clickTrigger: ".hero-video",
    popWrap: ".pop-video-wrapper",
    pop: ".pop-video",
    popCloser: ".pop-closer",
  });
}

var emails = document.querySelectorAll(".contacts-item--email");
emails.forEach(function (e) {
  e.addEventListener("click", function () {
    ym(74415211, "reachGoal", "email");
  });
});
var phones = document.querySelectorAll(".contacts-item--phone");
phones.forEach(function (e) {
  e.addEventListener("click", function () {
    ym(74415211, "reachGoal", "phone");
  });
}),
  document.querySelector(".hero-form").addEventListener("submit", function () {
    ym(74415211, "reachGoal", "hero-form");
  }),
  document
    .querySelector(".lead-form__form")
    .addEventListener("submit", function () {
      ym(74415211, "reachGoal", "footer-form");
    });

const tabsButtons = document.querySelectorAll(".program-tabs__control ");
const tabsPanel = document.querySelector(".program-wrapper");
if (tabsButtons) {
  tabsButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      tabsPanel.scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "nearest",
      });
      tabsButtons.forEach((button) => {
        button.classList.remove("program-tabs__control--current");
      });
      button.classList.add("program-tabs__control--current");
      const tabId = button.dataset.tab;

      const tabs = document.querySelectorAll(".program-tab");
      tabs.forEach((tab) => {
        tab.classList.remove("program-tab--current");
        if (tab.dataset.tab === tabId) {
          tab.classList.add("program-tab--current");
        }
      });
    });
  });
}

// const forms = document.querySelectorAll("form");

// forms.forEach((form) => {
//   form.addEventListener("submit", (e) => {
//     e.preventDefault();
//     const formData = new FormData(form);
//     console.log(formData);
//   });
// });
