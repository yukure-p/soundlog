"use strict";

lang();
var texts = ["Hello!", "I'm DJ SOUNDLOG", "I don't DJ MIX", "I don't play DJ", "Just select the music"],
    count = 0,
    index = 0,
    currentText = "",
    letter = "";
!function e() {
  count === texts.length && (count = 0), currentText = texts[count], letter = currentText.slice(0, ++index), (document.querySelector(".mvtype").textContent = letter).length === currentText.length && (++count, index = 0), setTimeout(e, 250);
}();