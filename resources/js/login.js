const $login_form = $("#log-in-form form")

$login_form.on('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const data = Object.fromEntries(formData.entries());

    axios.post(routes.api.login, data)
        .then(function (response) {
            let data = response.data.data
            if (data.token) {
                localStorage.setItem('auth_token', data.token);
                alert(response.data.message)
                window.location.href = routes.account
            } else {
                throw new Error
            }
        })
        .catch(function () {
            alert('Login failed');
        });
});
