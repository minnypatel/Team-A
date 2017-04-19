function validateUploadForm() {
    
    var title = document.forms["upload"]["title"].value;
    var checkTitle = /^[A-Za-z0-9!?@#$£%&*()'"\[\]{}_\-+ ]{1,45}$/;
    if (title === "" || title === null) {
        alert("Please enter a title for your blog post.");
        return false;
    }
    else if (!checkTitle.test(title)) {
        alert("We don't like your title. It's probably too long.");
        return false;
    }
    
    var category = document.forms["upload"]["category"].value;
    var checkCategory = /^([A-Za-z]){1,16}$/;
    if (category === "" || category === null) {
        alert("You may think you're too alt to be defined, but we still need to put your blog post into a category.");
        return false;
    }
    else if (!checkCategory.test(category)) {
        alert("We choose the boxes.");
        return false;
    }

// Using the rich text editor is breaking the validation. Note sure how to fix this one.
//    var content = document.forms["upload"]["content"].value;
//    var checkContent = /^[A-Za-z0-9!@#$£%&*()_ ]{1,1500}$/;
//    if (content === "") {
//        alert("Please enter some content for your blog post");
//        return false;
//    } else if {
//        alert("")
//        return false;
//    }
    
    var image = document.forms["upload"]["userFile"].value;
    if (image === ""  || image === null) {
        alert("A picture paints a thousand words mate. Use one.");
        return false;
    }
}

function validateUserLoginForm() {
    
    var username = document.forms["userLogin"]["username"].value;
    if (username === "" || username === null) {
        alert("Give us your name, Nemo.");
        return false;
    }
      
    var password = document.forms["userLogin"]["password"].value;
    if (password === "" || password === null) {
        alert("...don't forget the magic word!");
        return false;
    }  
}

function validateUserSignupForm() {
    
    var username = document.forms["userSignup"]["username"].value;
    var checkUsername = /^[a-z0-9]{1,16}$/;
    if (username === "" || username === null) {
        alert("Give us your name, Nemo.");
        return false;
    }
    else if (!checkUsername.test(username)) {
        alert("Usernames should be lowercase and numbers only.");
        return false;
    }
    
    var firstName = document.forms["userSignup"]["firstname"].value;
    var checkFirstName = /^[A-Za-z]{1,255}$/;
    if (firstName === "" || firstName === null) {
        alert("Give us your first name, Nemo.");
        return false;
    }
    else if (!checkFirstName.test(firstName)) {
        alert("Your name, not a number.");
        return false;
    }
    
    var lastName = document.forms["userSignup"]["lastname"].value;
    var checkLastName = /^[A-Za-z]{1,255}$/;
    if (lastName === "" || lastName === null) {
        alert("Give us your last name, Nemo.");
        return false;
    }
    else if (!checkLastName.test(lastName)) {
        alert("Your name, not a number.");
        return false;
    }
    
    var email = document.forms["userSignup"]["emailaddress"].value;
    var checkEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    if (email === "" || email === null) {
        alert("Give us your email address or you'll be too obscure for us to find you.");
        return false;
    }
    else if (!checkEmail.test(email)) {
        alert("Not a valid email address.");
        return false;
    }
    
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    if (pass1 !== pass2) {
        alert("Passwords do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        return false;
    }
    
    var password = document.forms["userSignup"]["password"].value;
    var checkPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&~+\-_.,^<>(){}\[\]])[A-Za-z\d$@$!%*#?&~+\-_.,^<>(){}\[\]]{8,20}$/;
    if (password === "" || password === null) {
        alert("...don't forget the magic word!");
        return false;
    } else if (!checkPassword.test(password)) {
        alert("Passwords should have between 8-20 characters, and contain at least one upper case letter, one lowercase letter, one number, and one special character.");
        return false;
    }
}

