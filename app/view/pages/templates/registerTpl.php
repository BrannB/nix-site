<form action ="register/reg" method="post">
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="fname">Firstname</label>
            <input type="text" class="form-control" id="fname" name="fname"
                   placeholder="Firstname" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="lname">Lastname</label>
            <input type="text" class="form-control" id="lname" name="lname"
                   placeholder="Lastname" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="uname">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                </div>
                <input type="text" class="form-control" id="uname" name="uname"
                       placeholder="Username" aria-describedby="inputGroupPrepend2" required>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email"
                   placeholder="Email" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="country">Country</label>
            <?php
            use app\models\DefaultModel;
            $result = new DefaultModel();
            $result = $result->get("country");
            ?>
            <select id="country" name="country">
                <?php foreach ($result as $country): ?>
                    <option value="<?php echo $country->id?>">
                        <?php echo $country->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="pass"
                   placeholder="Password" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="passConfirm">Confirm password</label>
            <input type="password" class="form-control" id="passConfirm" name="passConfirm"
                   placeholder="Password Confirm" required>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="invalidCheck2"
                   id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
                Agree to terms and conditions
            </label>
        </div>
    </div>
    <button class="btn btn-success" type="submit" name="submit-btn" >Submit form</button>
    <br><br>
</form>



