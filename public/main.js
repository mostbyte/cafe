$(document).ready(function() {

    $(".item").draggable({
        containment: "#tbl",
        // grid: [10, 10],
        cancel: ".resizer",
        cancel: ".editable",
        grid: [10, 10]
    });

    $(document).on("dblclick", ".item", function() {
        if(!$(this).hasClass("circle")) {
          $(this).addClass("circle")
        }
        else {
          $(this).removeClass("circle")
        }
        console.log($(".editable").width())
        console.log($(".item").width())
    });

    $(document).on("click", ".editable", function(){
      $(this).addClass("active");
      var lastClass = $(this);
      var lastClassText = $(this).text();
      $(document).on("mousedown", "html", function(e) {
        if($(e.target).attr("class") != "editable active" && $(".editable").hasClass("active")) {
          if(lastClass.text().trim().length == 0) {
            lastClass.text(lastClassText)
            lastClassText = lastClass.text()
          }
          else {
            lastClass.css({
              "border": "none"
            })
            lastClassText = lastClass.text()
            lastClass.removeClass("active")
          }
          // if(($(".item").width() - $(".editable").width()) <= 10) {

          // }
        }
      });
    });

      $(document).on("click",".close", function() {
        console.log($(this).parent().remove());
    });

    $(".btn").on("click", function() {
      $("#tbl").append('\
        <div class="item">\
          <span class="editable" contenteditable="true" >1</span>\
          <img class="close" src="https://img.icons8.com/windows/32/000000/macos-close.png"/>\
          <div class="resizer"></div>\
        </div>');
      $(".item").draggable({
        containment: "#tbl",
        // grid: [50, 50],
        cancel: ".resizer",
        cancel: ".editable",
        grid: [10, 10]
      });
      $(".item").resizable({
        containment: "#tbl",
        grid: [10, 10]
      });
        // var leftPos = $("#tbl:last-child").offset().left;
        // var topPos = $("#tbl:last-child").offset().top;
        // var divWidth = $("#tbl:last-child").width();
        // var divHeight = $("#tbl:last-child").height();
        $(".item").last().attr({
          style: "left: " + leftPos + "px; top: " + topPos + "px; width: " + divWidth + "px; height: " + divHeight + "px",
        });
      });


    // $(document).on("mousedown",".resizer",function(e){
    //   // $(this).parent()
    //   // console.log(e.clientX)
    //   startX = e.clientX;
    //   startY = e.clientY;
    //   startWidth = $(this).parent().width();
    //   startHeight = $(this).parent().height();
    //   $(this).parent().css({
    //     "maxWidth": ($("#tbl")[0].offsetLeft + $("#tbl")[0].offsetWidth - $(this).parent().offsetLeft) + "px",
    //     "maxHeight": ($("#tbl")[0].offsetTop + $("#tbl")[0].offsetHeight - $(this).parent().offsetTop) + "px",
    //   })
    //   $(document).on("mousemove", ".resizer", function(e) {
    //     $(this).parent().width(startWidth + e.clientX - startX)
    //     $(this).parent().height(startHeight + e.clientY - startY)
    //   });
    // });

$(".item").resizable({
  containment: "#tbl",
  grid: [10, 10],
});

  var leftPos = $(".item").offset().left;
  var topPos = $(".item").offset().top;
  var divWidth = $(".item").width();
  var divHeight = $(".item").height();
  $(".item").attr({
    style: "left: " + leftPos + "px; top: " + topPos + "px; width: " + divWidth + "px; height: " + divHeight + "px",
  });
});

for (var i = 0; i < 50; i++) {
  $("<div>", {
    class: "rows"
  }).css({
    height: "9px",
    width: "701px",
    top: (10 * i ) + "px"
  }).insertBefore($("#tbl"));
}
for (var i = 0; i < 70 ; i++) {
  $("<div>", {
    class: "cols"
  }).css({
    width: "9px",
    height: "501px",
    left: (10 * i ) + "px"
  }).insertBefore($("#tbl"));
}





