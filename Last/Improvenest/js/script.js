var lookup = {
   'Western': ['Colombo', 'Gampaha', 'Kaluthara'],
   'Southern': ['Galle', 'Matara', 'Hambanthota'],
   'Central': ['Mathale', 'Kandy', 'Nuwara Eliya'],
   'Uva': ['Badulla', 'Monaragala'],
   'Sabaragamuwa': ['Kegalle', 'Rathnapura'],
   'North Western': ['Puttalam', 'Kurunegala'],
   'North Central': ['Anuradhapura', 'Polonnaruwa'],
   'Nothern': ['Jaffna', 'Kilinochchi', 'Mulathive', 'Mannar', 'Vavunia'],
   'Eastern': ['Trincomalee', 'Batticaloa', 'Ampara'],
};

// When an option is changed, search the above for matching choices
$('#province').on('change', function() {
   // Set selected option as variable
   var selectValue = $(this).val();

   // Empty the target field
   $('#district').empty();
   
   // For each chocie in the selected option
   for (i = 0; i < lookup[selectValue].length; i++) {
      // Output choice in the target field
      $('#district').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
   }
});