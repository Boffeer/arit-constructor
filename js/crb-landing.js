if (document.querySelector(".pricing-popup")) {
  poppa({
    pop: ".pricing-popup",
    clickTrigger: ".pricing-bundle__button",
  });

  const pricingButtons = document.querySelectorAll(".pricing-bundle__button");
  const pricingPopup = document.querySelector(".pricing-popup");
  pricingButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      let landingName = button.dataset.page;
      let bundleName = `${landingName}. Тариф ${
        button.parentElement.querySelector(".pricing-bundle__title").innerText
      }`;
      const formName = pricingPopup.querySelector('input[name="from"]');
      formName.value = bundleName;
      console.log(formName.value);
    });
  });
}
