var currentPage = location;
var newGroupForm;

$("#bs-example-navbar-collapse-1 ul li a").each(function(){
  if($(this).attr("href") == currentPage ){
  	console.log(location);
  	$(this).parent().addClass("active");
  }
});

function editGroup(groupId) {
	var groupDiv = document.getElementById(groupId);
	console.log(groupId);
	groupDiv.children[1].style.display = 'none';
	groupDiv.children[2].style.display = 'none';
	groupDiv.children[3].style.display = 'none';
	groupDiv.children[0].style.display = 'block';
}