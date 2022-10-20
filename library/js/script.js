let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
}

const forms = document.querySelector(".forms"),
pwShowHide = document.querySelectorAll(".eye-icon"),
links = document.querySelectorAll(".link");

pwShowHide.forEach(eyeIcon => {
eyeIcon.addEventListener("click", () => {
  let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
  
  pwFields.forEach(password => {
      if(password.type === "password"){
          password.type = "text";
          eyeIcon.classList.replace("bx-hide", "bx-show");
          return;
      }
      password.type = "password";
      eyeIcon.classList.replace("bx-show", "bx-hide");
  })
  
})
})      

links.forEach(link => {
link.addEventListener("click", e => {
 e.preventDefault(); //preventing form submit
 forms.classList.toggle("show-signup");
})
})



//-----------------------AJAX---------------------
function getXMLHTTPRequest() {
  if (window.XMLHttpRequest) {
      return new XMLHttpRequest();
  } else {
      return new ActiveXObject("Microsoft.XMLHTTP");
  }
}

function changePKL(nim) {
  console.log("clicked")
  var xmlhttp = getXMLHTTPRequest()
  var status = document.getElementById(nim).value;
  var url = "getPKL.php?nim=" + nim + "&status=" + status;
  xmlhttp.open('GET', url, true);
  xmlhttp.onreadystatechange = function() {
      if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
          document.getElementById("db_status").innerHTML = xmlhttp.responseText;
      }
      return false;
  }
  xmlhttp.send(null);
}

function changeKHS(nim) {
  console.log("clicked")
  var xmlhttp = getXMLHTTPRequest()
  var status = document.getElementById(nim).value;
  var url = "getKHS.php?nim=" + nim + "&status=" + status;
  xmlhttp.open('GET', url, true);
  xmlhttp.onreadystatechange = function() {
      if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
          document.getElementById("db_status").innerHTML = xmlhttp.responseText;
      }
      return false;
  }
  xmlhttp.send(null);
}

function changeSkripsi(nim) {
  console.log("clicked")
  var xmlhttp = getXMLHTTPRequest()
  var status = document.getElementById(nim).value;
  var url = "getSkripsi.php?nim=" + nim + "&status=" + status;
  xmlhttp.open('GET', url, true);
  xmlhttp.onreadystatechange = function() {
      if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
          document.getElementById("db_status").innerHTML = xmlhttp.responseText;
      }
      return false;
  }
  xmlhttp.send(null);
}

//-----------------------END AJAX------------------
