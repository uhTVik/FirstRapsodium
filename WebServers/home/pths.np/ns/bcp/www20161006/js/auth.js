function authorise() {
	auth.btn.disabled = true;
	ajax({
		url: "/auth.php",
		data: auth.serialize(),
		success: function(response) {
			switch (response) {
			case "0":
				
				break;
			default:
				error("Пароль, блин, непрвильный или неверный или недостоверный	")
				auth.btn.disabled = false;
				break;
			}
		}
	});
	return false;
}