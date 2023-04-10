const validation = new JustValidate("#register-form");

validation
  .addField("#fname", [
    {
      rule: "required",
    },
  ])
  .addField("#lname", [
    {
      rule: "required",
    },
  ])
  .addField("#ph_no", [
    {
      rule: "minLength",
      value: 10,
    },
    {
      rule: "required",
    },
  ])
  .addField("#password", [
    {
      rule: "required",
    },
    {
      rule: "password",
    },
  ])
  .addField("#email", [
    {
      rule: "required",
    },
    {
      rule: "email",
    },
  ])
  .onSuccess((event) => {
    document.getElementById("register-form").submit();
  });


