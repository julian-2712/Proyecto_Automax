// SEND EMAIL

function sendEmail() {
    // Replace the following values with your desired recipient, subject, and body
    var recipient = 'recipient@example.com';
    var subject = 'Your email subject';
    var body = 'Your email body text';

    // Construct the mailto URL
    var mailtoLink = 'mailto:' + recipient + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);

    // Open the user's default email client
    window.location.href = mailtoLink;
}

// END SEND EMAIL