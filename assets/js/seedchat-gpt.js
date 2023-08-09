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
    submitButton.on('click', async function () {
        var userMessage = messageInput.val().trim();
        if (userMessage !== '') {
            appendMessage(userMessage, 'user');
            messageInput.val('');
    
            try {
                // Make an API call to the ChatGPT API
                const response = await axios.post('https://api.openai.com/v1/chat/completions', {
                    messages: [{ role: 'user', content: userMessage }],
                }, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer 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', // Replace with your actual API key
                    },
                });
    
                // Get the bot's reply from the API response
                const botReply = response.data.choices[0].message.content;
    
                // Display the bot's reply after a delay
                setTimeout(function () {
                    appendMessage(botReply, 'bot');
                }, 1000);
            } catch (error) {
                console.error('Error fetching chatbot response:', error);
            }
        }
    });
    

    // Initialize the chatbot on page load
    initializeChatbot();
});
