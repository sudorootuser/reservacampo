// get pagination
function pagination(totalpages, currentpage) {
  var pagelist = "";
  if (totalpages > 1) {
    currentpage = parseInt(currentpage);
    pagelist += `<ul class="pagination justify-content-center">`;
    const prevClass = currentpage == 1 ? " disabled" : "";
    pagelist += `<li class="page-item${prevClass}"><a class="page-link" href="#" data-page="${
      currentpage - 1
    }">Previous</a></li>`;
    for (let p = 1; p <= totalpages; p++) {
      const activeClass = currentpage == p ? " active" : "";
      pagelist += `<li class="page-item${activeClass}"><a class="page-link" href="#" data-page="${p}">${p}</a></li>`;
    }
    const nextClass = currentpage == totalpages ? " disabled" : "";
    pagelist += `<li class="page-item${nextClass}"><a class="page-link" href="#" data-page="${
      currentpage + 1
    }">Next</a></li>`;
    pagelist += `</ul>`;
  }

  $("#pagination").html(pagelist);
}

// get player row
function getplayerrow(player) {
  var playerRow = "";
  if (player) {
    const userphoto = player.imagen ? player.imagen : "default.png";
    playerRow = `<tr>
    //  class="img-thumbnail rounded float-left"
          <td class="align-middle"><img src="uploads/${userphoto}" style="width:120px; height:90px;"></td>
          <td class="align-middle">${player.nombre_Campo}</td>
          <td class="align-middle">${player.tipo_Cancha}</td>
          <td class="align-middle">${player.mantenimiento}</td>
          <td class="align-middle">
          <a href="#" class="btn btn-success mr-3 profile" data-toggle="modal" data-target="#userViewModal"
                title="Prfile" data-id="${player.id}"><i class="fa fa-address-card" aria-hidden="true"></i></a>
          </td>
        </tr>`;
  }
  //
  return playerRow;
}
// get players list
function getplayers() {
  var pageno = $("#currentpage").val();
  $.ajax({
    url: "/reservacampo/Controladores/Campo_Cons/ajax.php",
    type: "GET",
    dataType: "json",
    data: { page: pageno, action: "getusers" },
    beforeSend: function () {
      $("#overlay").fadeIn();
    },
    success: function (rows) {
      console.log(rows);
      if (rows.players) {
        var playerslist = "";
        $.each(rows.players, function (index, player) {
          playerslist += getplayerrow(player);
        });
        $("#userstable tbody").html(playerslist);
        let totalPlayers = rows.count;
        let totalpages = Math.ceil(parseInt(totalPlayers) / 3);
        const currentpage = $("#currentpage").val();
        pagination(totalpages, currentpage);
        $("#overlay").fadeOut();
      }
    },
    error: function () {
      console.log("something went wrong");
    },
  });
}

$(document).ready(function () {
  // add/edit user
  $(document).on("submit", "#addform", function (event) {
    event.preventDefault();
    var alertmsg =
      $("#userid").val().length > 0
      ? "La Cancha se ha actualizado con Éxito!"
      : "Se ha Creado la Nueva Cancha con Éxito!";
    $.ajax({
      url: "/reservacampo/Controladores/Campo_Cons/ajax.php",
      type: "POST",
      dataType: "json",
      data: new FormData(this),
      processData: false,
      contentType: false,
      beforeSend: function () {
        $("#overlay").fadeIn();
      },
      success: function (response) {
        console.log(response);
        if (response) {
          $("#userModal").modal("hide");
          $("#addform")[0].reset();
          $(".message").html(alertmsg).fadeIn().delay(3000).fadeOut();
          getplayers();
          $("#overlay").fadeOut();
        }
      },
      error: function () {
        console.log("Oops! Something went wrong!");
      },
    });
  });
  // pagination
  $(document).on("click", "ul.pagination li a", function (e) {
    e.preventDefault();
    var $this = $(this);
    const pagenum = $this.data("page");
    $("#currentpage").val(pagenum);
    getplayers();
    $this.parent().siblings().removeClass("active");
    $this.parent().addClass("active");
  });
  // form reset on new button
  $("#addnewbtn").on("click", function () {
    $("#addform")[0].reset();
    $("#userid").val("");
  });
  //  get user

  $(document).on("click", "a.edituser", function () {
    var pid = $(this).data("id");

    $.ajax({
      url: "/reservacampo/Controladores/Campo_Cons/ajax.php",
      type: "GET",
      dataType: "json",
      data: { id: pid, action: "getuser" },
      beforeSend: function () {
        $("#overlay").fadeIn();
      },
      success: function (player) {
        if (player) {
          $("#username").val(player.nombre_Campo);
          $("#phone").val(player.tipo_Cancha);
          $("#email").val(player.mantenimiento);
          $("#userid").val(player.id);
        }
        $("#overlay").fadeOut();
      },
      error: function () {
        console.log("something went wrong");
      },
    });
  });

  // delete user
  $(document).on("click", "a.deleteuser", function (e) {
    e.preventDefault();
    var pid = $(this).data("id");
    if (confirm("Está seguro que quiere eliminar la cancha?")) {
      $.ajax({
        url: "/reservacampo/Controladores/Campo_Cons/ajax.php",
        type: "GET",
        dataType: "json",
        data: { id: pid, action: "deleteuser" },
        beforeSend: function () {
          $("#overlay").fadeIn();
        },
        success: function (res) {
          if (res.deleted == 1) {
            $(".message")
              .html("La Cancha se ha eliminado con Éxito!")
              .fadeIn()
              .delay(3000)
              .fadeOut();
            getplayers();
            $("#overlay").fadeOut();
          }
        },
        error: function () {
          console.log("something went wrong");
        },
      });
    }
  });
  // get profile

  $(document).on("click", "a.profile", function () {
    var pid = $(this).data("id");
    $.ajax({
      url: "/reservacampo/Controladores/Campo_Cons/ajax.php",
      type: "GET",
      dataType: "json",
      data: { id: pid, action: "getuser" },
      success: function (player) {
        if (player) {
          const userphoto = player.imagen ? player.imagen : "default.png";
          const profile = `<div class="row">
                <div class="col-sm">
                <h4 class="text-success"style="margin-left:120px;">${player.nombre_Campo}</h4>
                  <img src="uploads/${userphoto}" style="width:430px; margin-right:50px;height:250px;"class="rounded responsive"/>
                </div>
              </div>`;
          $("#profile").html(profile);
        }
      },
      error: function () {
        console.log("something went wrong");
      },
    });
  });

  // searching
  $("#searchinput").on("keyup", function () {
    const searchText = $(this).val();
    if (searchText.length > 1) {
      $.ajax({
        url: "/reservacampo/Controladores/Campo_Cons/ajax.php",
        type: "GET",
        dataType: "json",
        data: { searchQuery: searchText, action: "search" },
        success: function (players) {
          if (players) {
            var playerslist = "";
            $.each(players, function (index, player) {
              playerslist += getplayerrow(player);
            });
            $("#userstable tbody").html(playerslist);
            $("#pagination").hide();
          }
        },
        error: function () {
          console.log("something went wrong");
        },
      });
    } else {
      getplayers();
      $("#pagination").show();
    }
  });
  // load players
  getplayers();
});