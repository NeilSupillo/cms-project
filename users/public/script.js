function truncateText() {
  const textContainer = document.getElementById("text-container");
  const text = textContainer.textContent;
  const wordLimit = 50;

  if (text.trim().split(/\s+/).length > wordLimit) {
    const truncatedText =
      text.trim().split(/\s+/).slice(0, wordLimit).join(" ") + "...";
    textContainer.innerHTML = truncatedText;
  }
}

truncateText();
