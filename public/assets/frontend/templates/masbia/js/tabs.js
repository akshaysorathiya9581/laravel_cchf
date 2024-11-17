document.addEventListener("DOMContentLoaded", function () {
  const tabLinks = document.querySelectorAll(".tab-link");
  const tabContents = document.querySelectorAll(".tab-content");
  let isInitialLoad = true;
  const tabList = document.querySelector(".tab-list");
  const activeTab = tabList.getAttribute("data-active-tab");

  function showTab(tabId, scroll = true) {
    tabContents.forEach((content) => {
      content.classList.remove("active");
      if (content.id === tabId) {
        content.classList.add("active");
      }
    });
    tabLinks.forEach((link) => {
      link.classList.remove("active");
      if (link.dataset.tab === tabId) {
        link.classList.add("active");
      }
    });

    if (scroll && isInitialLoad) {
      const targetElement = document.getElementById(tabId);
      if (targetElement) {
        const targetPosition =
          targetElement.getBoundingClientRect().top + window.scrollY - 80;

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      }
    }
    isInitialLoad = false;
  }

  window.addEventListener("load", function () {
    const hash = window.location.hash.substring(1);
    if (hash) {
      showTab(hash);
    } else {
      showTab(activeTab, false);
    }
  });

  tabLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      const tabId = this.dataset.tab;
      showTab(tabId, false);

      history.replaceState(null, null, `#${tabId}`);
    });
  });

  window.addEventListener("hashchange", function () {
    const newHash = window.location.hash.substring(1);
    if (newHash) {
      showTab(newHash);
    }
  });
});
