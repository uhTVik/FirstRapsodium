function authorize() {
	var holder = ge("auth-holder");
	auth.btn.disabled = true;
	loading(holder);
	ajax({
		url: "auth.php",
		data: auth.serialize(),
		success: function(response) {
			switch (response) {
			case "0":
				location.reload();
				break;
			case "1":
				error("Пароль неправильный, а может быть и логин", holder);
				break;
			case "2":
				error("Как говорит Netschool, вы совершили 3 неудачные попытки входа. Следующая попытка может быть совершена не ранее чем через минуту", holder);
				break;
			default:
				console.log(response);
			}
			auth.btn.disabled = false;
		}
	});
	return false;
}