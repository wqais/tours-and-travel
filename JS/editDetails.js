const editUserDetails = new JustValidate("#edit-form");

editUserDetails
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
      rule: "minNumber",
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
    document.getElementById("edit-form").submit();
  });