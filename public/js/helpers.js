/**
 * Get validation errors in JSON  format.
 *
 * @param  {array} response
 * @return {array}
 */
 function getJsonErrors(response)
 {
     return response.responseJSON.errors;
 }

/**
  * Get error response from ajax call.
  *
  * @param  {array} errors
  * @return {[void]}
  */
 function errorResponse(errors)
 {
     if(errors) {
         displayErrors(errors);
         removeErrorOnNewInput();
     }
 }

/**
 * Display all errors.
 *
 * @param  {array} errors
 * @return void
 */
function displayErrors(errors)
{
    for (error in errors)
    {
        var feedback = $("span."+error).show()

        displayServerError(feedback, errors[error][0]);
    }
}


/**
 * Display an error.
 *
 * @param  {string} field
 * @param  {string} feedback
 * @param  {string} error
 * @return {void}
 */
function displayServerError(feedback, error)
{
    feedback.text(error);
}

/**
 * Remove error on inserting the new value.
 *
 * @return void
 */
function removeErrorOnNewInput()
{
    $("select").on('change', function () {
      $(this).siblings(".invalid-feedback").hide().text('');
    });

    $("input, textarea").on('keydown', function() {
        $(this).parent().siblings().find(".invalid-feedback.qty").hide().text('');
    });
}
