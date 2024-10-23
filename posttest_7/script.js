const body = document.body;

function dark () {
    body.classList.toggle('dark-mode');
}

// Validasi form registrasi
function validasiForm() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    if (name === "") {
        alert("Nama Harus Terisi");
        return false;
    }

    if (name.length > 20) {
        alert("Nama tidak boleh lebih dari 20 karakter");
        return false;
    }

    if (email === "") {
        alert("Email Harus Terisi");
        return false;
    }

    if (password === "") {
        alert("Password Harus Terisi");
        return false;
    }

    if (password.length < 8) {
        alert("Password tidak boleh kurang dari 8 karakter");
        return false;
    }

    if (!validasiPassword(password)) {
        return false;
    }

    return true;
}

// Fungsi validasi password tambahan (misalnya huruf besar, huruf kecil, dll.)
function validasiPassword(password) {
    if (!/[a-z]/.test(password)) {
        alert("Password harus mengandung setidaknya satu huruf kecil.");
        return false;
    }

    if (!/[A-Z]/.test(password)) {
        alert("Password harus mengandung setidaknya satu huruf besar.");
        return false;
    }

    if (!/[@$!%*?&]/.test(password)) {
        alert("Password harus mengandung setidaknya satu karakter spesial (@, $, !, %, *, ?, &).");
        return false;
    }

    return true;
}
