document.addEventListener("DOMContentLoaded",function(){const t=`const developer = {
            name: 'MJ Stack',
            skills: ['Laravel', 'Vue.js', 'TailwindCSS'],
            passion: 'Partager mes connaissances',
            mission: () => {
                return 'Créer du contenu utile et inspirant';
            }
        };`,a=document.getElementById("typing-text");let e=0;function r(n){return n.replace(/\n/g,"<br>").replace(/ {4}/g,"&nbsp;&nbsp;&nbsp;&nbsp;").replace(/const/g,'<span class="text-blue-400">const</span>').replace(/developer/g,'<span class="text-green-400">developer</span>').replace(/return/g,'<span class="text-purple-400">return</span>').replace(/'([^']+)'/g,`<span class="text-yellow-300">'$1'</span>`)}function s(){if(e<t.length){const n=t.slice(0,e+1);a.innerHTML=r(n),e++,setTimeout(s,50)}}s()});
