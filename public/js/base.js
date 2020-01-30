window.onscroll = function() {scrollFunction()};

function scrollFunction() {

  if (document.body.scrollTop > 165 || document.documentElement.scrollTop > 165){
    document.getElementById("navbar").style.position = "fixed";
    document.getElementById("navbar").style.top = "-100px";

  }

  if (document.body.scrollTop > 165 || document.documentElement.scrollTop > 165) {
    // document.getElementById("carouselExampleIndicators").style.top = "160px";
    // document.getElementById("navbar").style.position = "fixed";
    $(".navbar").addClass("compressed");
    document.getElementById("navbar").style.top = "0px";
    document.getElementById("navbar").style.padding="0"

    // document.getElementById("logoimg").width = "150px";
    // document.getElementById("logoimg").height = "50px";
    $('#logoimg').width("150px");
    $('#logoimg').height("50px");
$('#logoimg').width(150);
  } else {
    $(".navbar").removeClass("compressed");
    document.getElementById("navbar").style.position = "";
    document.getElementById("navbar").style.padding=""
    document.getElementById("navbar").style.top = "";
    // document.getElementById("logoimg").width = "350";
    // document.getElementById("logoimg").height = "120";
    $('#logoimg').width("350px");
    $('#logoimg').height("120px");
    document.getElementById("carouselIndicators").style.top = "0px";

  }
}

function moveNav() {
  document.getElementById("navbar").style.top = "0px";
}
