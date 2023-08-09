jQuery(document).ready(function ($) {
    // Define chatbot elements
    var chatbotContainer = $('#seedchat-gpt-chatbot');
    var conversationArea = $('#seedchat-gpt-conversation');
    var messageInput = $('#seedchat-gpt-message');
    var submitButton = $('#seedchat-gpt-submit');

    // Initialize chatbot
    function initializeChatbot() {
        appendMessage('Welcome to SeedChat GPT! How can I assist you?', 'bot');
    }

    // Append a message to the conversation area
    function appendMessage(message, sender) {
        var messageClass = sender === 'user' ? 'user-message' : 'bot-message';
        var messageElement = $('<div>').addClass('chat-message').addClass(messageClass).text(message);
        conversationArea.append(messageElement);

        // Scroll to the bottom of the conversation
        conversationArea.scrollTop(conversationArea[0].scrollHeight);
    }

    // Handle user input
    submitButton.on('click', function () {
        var userMessage = messageInput.val().trim();
        if (userMessage !== '') {
            appendMessage(userMessage, 'user');
            messageInput.val('');

            // Call the API to get chatbot response (replace with your API endpoint)
            // Example: $.post('your_api_url', { message: userMessage }, function (response) { ... });

            // For now, let's simulate a bot response
            var botResponse = 'I understand. Please wait while I fetch the information.';
            setTimeout(function () {
                appendMessage(botResponse, 'bot');
            }, 1000);
        }
    });

    // Initialize the chatbot on page load
    initializeChatbot();
});
