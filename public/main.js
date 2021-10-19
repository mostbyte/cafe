$(function() {
    $(".item").draggable({
        containment: "#tbl",
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
        }
      });
    });

    $(".add-table-btn").on("click", function() {
        const itemsCount = $('.item').length + 1;

        $("#tbl").append(`
            <div class="item" id="${itemsCount}">
            <span class="editable" contenteditable="true" id="table-name-${itemsCount}">${itemsCount}</span>\
            <img class="close" src="https://img.icons8.com/windows/32/000000/macos-close.png"/>
            <div class="resizer"></div>
            </div>`);

        $(".item").draggable({
            containment: "#tbl",
            cancel: ".resizer",
            cancel: ".editable",
            grid: [10, 10]
        });

        $(".item").resizable({
            containment: "#tbl",
            grid: [10, 10]
        });

        createTable({x: 1, y: 1, width: 100, height: 100, type: 'square'});

    });

    $(".item").resizable({
        containment: "#tbl",
        grid: [10, 10],
    });

});

$(document).on("click",".close", function(params) {
    console.log($(this).parent().remove());
    params ={
        '_token' : '',
        'data' : '',
    };
    params._token = $("meta[name='csrf_token']").attr('content');
    params.data = $(this).parent()[0].id;
    console.log(params);
    $.ajax({
        url: `${window.location.origin}/admin/table/destroy`,
        type: 'post',
        data: params,
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


createTable = function(params) {
    params._token = $("meta[name='csrf_token']").attr('content');
    $.ajax({
        url: `${window.location.origin}/admin/table/store`,
        type: 'post',
        data: params,
    });
}

updateTable = function(table) {
    $.ajax({
        url: `${window.location.origin}/admin/table/update`,
        type: 'put',
        data: table,
    });
}

$('.save-table-btn').on('click', function(){
    var dataTab = {};
    dataTab.tables = [];
    dataTab._token = $("meta[name='csrf_token']").attr('content');
    $(".item").each((index, table) => {
        dataTab.tables.push({
            coordinates: JSON.stringify({
                x: table.offsetTop,
                y: table.offsetLeft,
            }),
            size: JSON.stringify({
                width: table.offsetWidth,
                height: table.offsetHeight,
            }),
            id: table.id,
            type: typeOfTable(table),
        });
    });
    updateTable(dataTab);
});


typeOfTable = function(value){
    if(value.classList.contains('circle')){
        return 'circle'
    }else{
        return 'square'
    }
}


