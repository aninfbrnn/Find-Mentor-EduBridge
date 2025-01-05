window.addEventListener('scroll-bottom', () => {
    const conversationElement = document.getElementById('conversation');
    conversationElement.scrollTop = conversationElement.scrollHeight;
});