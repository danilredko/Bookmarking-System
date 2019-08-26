function load_chapter(url, row_num){

  console.log(row_num);
  console.log(" url: "+url);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {



    }
  };

  xhttp.open("GET", "show_chapter.php?q="+url, true);
  xhttp.send();

};
