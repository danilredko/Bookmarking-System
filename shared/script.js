
function edit_url(url){

  new_url = document.createElement('input');
  new_url.setAttribute('id', 'new_url');
  document.body.appendChild(new_url);


  done_button = document.createElement('button');
  done_button.textContent = 'DONE';
  done_button.setAttribute('onclick', 'change_url('+url+')');
  document.body.appendChild(done_button);

  new_url = getNewUrl();

  return new_url;

}
function getNewUrl(){
  return document.getElementById('new_url').value;
}


function change_url(url){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      // new_url = document.createElement('input');
      // new_url.setAttribute('id', 'new_url');
      // document.body.appendChild(new_url);

      d = document.createElement('p');
      d.textContent = edit_url();
      document.body.appendChild(d);


    }
  };
  xhttp.open("GET", "edit_bookmark.php?q="+url, true);
  xhttp.send();

};
