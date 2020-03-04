function nextQuestion(int) {
    let questionCounter = $(".questionCounter").attr("id");
  for (var i = 0; i < questionCounter; i++) {
    $(".question" + i).addClass("dn");
  }
  $(".question" + int - 1).addClass("db");
  $(".question" + int).removeClass("dn");
}

window.onload = nextQuestion(0);
