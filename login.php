<form action="route.php" method="post">
    <span class="loginLineBreak my-4">Login</span>
    <div class="mb-3">
        <label htmlFor="exampleInputEmail1" class="form-label fw-semibold fs-6">
            Username
        </label>
        <input type="text" name="username" class="inputField input-form form-control px-3 fs-6 fw-normal" id="exampleInputEmail1" required />
    </div>
    <div class="mb-3">
        <label htmlFor="inputPassword" class="form-label fw-semibold fs-6">
            Password
        </label>
        <div id="login">
            <div class="passwordContainer">
                <input type="password" class="inputField input-form form-control px-3 fs-6 fw-normal" id="inputPassword" name="password" required />
                <i class="fa-solid fa-eye-slash" id="passwordIconId"></i>
            </div>
        </div>
    </div>

    <input type="hidden" name="route" value="login">

    <button type="submit" class="buttonTemplate sumbit-button btn rounded-2 w-100 mt-3">
        Log in
    </button>
</form>