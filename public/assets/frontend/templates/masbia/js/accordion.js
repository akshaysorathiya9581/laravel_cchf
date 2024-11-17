document.addEventListener("click", function (e) {
  const triggerElement = e.target.closest("[data-spoiler-trigger]");
  if (!triggerElement) return;

  const clickedButton = e.target.closest("button");
  if (clickedButton) return;

  const box = triggerElement.closest("[data-spoiler]");
  if (box.getAttribute("data-spoiler") === "active") {
    box.setAttribute("data-spoiler", "");
  } else {
    const accordionList = box.closest('[data-spoiler-list="accordion"]');
    if (accordionList) {
      const activeSpoilers = accordionList.querySelectorAll(
        '[data-spoiler="active"]'
      );
      activeSpoilers.forEach(function (activeBox) {
        activeBox.setAttribute("data-spoiler", "");
      });
    }
    box.setAttribute("data-spoiler", "active");
  }

  document.dispatchEvent(new Event("trigger-spoiler"));
});
