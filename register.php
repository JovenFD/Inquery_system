<style>
    .polygon1.position-relative {
        height: 100% !important;
    }
</style>

<form action="route.php" method="post">
    <span class="loginLineBreak my-4">Register</span>
    <div class="mb-3">
        <label class="form-label fw-semibold fs-6">
            First Name
        </label>
        <input type="text" name="fname" class="inputField input-form form-control px-3 fs-6 fw-normal" id="exampleInputEmail1" required/>
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold fs-6">
            Last Name
        </label>
        <input type="text" name="lname" class="inputField input-form form-control px-3 fs-6 fw-normal" id="exampleInputEmail1" required/>
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold fs-6">
            Username
        </label>
        <input type="text" name="username" class="inputField input-form form-control px-3 fs-6 fw-normal" id="exampleInputEmail1" required/>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold fs-6">
            Email
        </label>
        <input type="email" name="email" class="inputField input-form form-control px-3 fs-6 fw-normal" id="exampleInputEmail1" required/>
    </div>

    <div class="mb-3">
        <label htmlFor="inputPassword" class="form-label fw-semibold fs-6">
            Password
        </label>
        <div id="login">
            <div class="passwordContainer">
                <input type="password" name="password" class="inputField input-form form-control px-3 fs-6 fw-normal" id="inputPassword" required/>
                <i class="fa-solid fa-eye-slash" id="passwordIconId"></i>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold fs-6">
            Birthday
        </label>
        <input type="date" name="dob" class="inputField input-form form-control px-3 fs-6 fw-normal" id="exampleInputEmail1" />
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold fs-6">
            Gender
        </label>
        <select class="inputField input-form form-control px-3 fs-6 fw-normal" name="gender" required>
            <option disabled>Select Your Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>

    <input type="hidden" name="route" value="register">

    <button type="submit" class="buttonTemplate sumbit-button btn rounded-2 w-100 mt-3">
        Register
    </button>
</form>