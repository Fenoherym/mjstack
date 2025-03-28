document.addEventListener('DOMContentLoaded', function () {
    const text = `const developer = {
            name: 'MJ Stack',
            skills: ['Laravel', 'Vue.js', 'TailwindCSS'],
            passion: 'Partager mes connaissances',
            mission: () => {
                return 'Créer du contenu utile et inspirant';
            }
        };`;

    const typingElement = document.getElementById('typing-text');
    let index = 0;

    function colorizeCode(code) {
        const formattedCode = code.replace(/\n/g, '<br>')
            .replace(/ {4}/g, '&nbsp;&nbsp;&nbsp;&nbsp;');

        return formattedCode
            .replace(/const/g, '<span class="text-blue-400">const</span>')
            .replace(/developer/g, '<span class="text-green-400">developer</span>')
            .replace(/return/g, '<span class="text-purple-400">return</span>')
            .replace(/'([^']+)'/g, '<span class="text-yellow-300">\'$1\'</span>');
    }

    function typeText() {
        if (index < text.length) {
            const currentText = text.slice(0, index + 1);
            typingElement.innerHTML = colorizeCode(currentText);
            index++;
            setTimeout(typeText, 50);
        }
    }

    typeText();
});