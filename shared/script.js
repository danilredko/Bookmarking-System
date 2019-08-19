
function edit_url(url, row_num){
  console.log("HERE: "+url);
  setOldUrl(url);

  new_url = document.createElement('input');
  new_url.setAttribute('id', 'new_url'+row_num);
  new_url.setAttribute('value', url);
  document.getElementById('row'+row_num).appendChild(new_url);

  var string_url = String(url);

  done_button = document.createElement('button');
  done_button.textContent = 'SAVE';
  done_button.setAttribute('id', 'done_button');
  done_button.setAttribute("onclick", "change_url("+row_num+")");
  document.getElementById('row'+row_num).appendChild(done_button);

  cancel_button = document.createElement('button');
  cancel_button.textContent = 'CANCEL';
  cancel_button.setAttribute('id', 'cancel_button');
  cancel_button.setAttribute('onclick', 'change_url('+row_num+')');
  document.getElementById('row'+row_num).appendChild(cancel_button);

  return url;

}
function getNewUrl(row_num){
  // console.log('getting url:' + 'new_url'+row_num);
  return document.getElementById('new_url'+row_num).value;
}
var old_url = '';
function setOldUrl(url){
  old_url = url;
}

function change_url(row_num){
  console.log(row_num);
  console.log("old_url: "+old_url);
  console.log("new_url:" + getNewUrl(row_num));
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        strResponse = this.responseText.replace(/\s/g, '');
        console.log(strResponse);
        document.getElementById('row_button'+row_num).setAttribute("onclick", "edit_url("+"'"+getNewUrl(row_num)+"'"+","+row_num+")");
        document.getElementById(old_url).textContent = strResponse;
        document.getElementById(old_url).setAttribute('id', strResponse);
        document.getElementById('cancel_button').remove();
        document.getElementById('done_button').remove();
        document.getElementById('new_url'+row_num).remove();

    }
  };

  xhttp.open("GET", "edit_bookmark.php?new_url="+getNewUrl(row_num)+"&old_url="+old_url, true);
  xhttp.send();

};
