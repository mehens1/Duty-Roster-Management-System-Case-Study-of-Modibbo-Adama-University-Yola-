var mau_user_token = localStorage.getItem("mau_user_token");
if(!mau_user_token){
    alert("No token found");
    window.location.href = '../index.php';
}else{
    alert(mau_user_token);
}