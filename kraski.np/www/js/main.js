var isBack = false;

function coors(elem) { // кроме IE8-
    let box = elem.getBoundingClientRect();
    return {
        top: box.top + pageYOffset,
        left: box.left + pageXOffset
    };
}

function readTextFile(file, callback) {
    const rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function () {
        if (rawFile.readyState === 4 && rawFile.status === 200) {
            callback(rawFile.responseText);
        }
    };
    rawFile.send(null);
}

function readHTMLFile(file, callback) {
    const rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("text/html");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function () {
        if (rawFile.readyState === 4 && rawFile.status === 200) {
            callback(rawFile.responseText);
        }
    };
    rawFile.send(null);
}

window.onload = function () {
    go(goToPage);
    let topSwitchBox = document.getElementById("top-switch-box");
    let switchDiv = topSwitchBox.getElementsByClassName("switch-div")[0];
    let ulLeft = document.getElementById('ul-left');
    readTextFile("/json/logos.json", function (text) {
        var logos = JSON.parse(text);
        for (let i = 0; i < logos.length; i++) {
            var li = document.createElement('li');
            ulLeft.appendChild(li);
            var a = document.createElement('a');
            a.href = logos[i].site;
            a.target = "_blank";
            var img = document.createElement('img');
            img.alt = "partner";
            img.src = "/images/logos/" + logos[i].logo;
            a.appendChild(img);
            li.appendChild(a);
        }

    });
}

window.addEventListener('popstate', function(e) {
    isBack = true;
    go(e.state);
}, false);

function go(pageName) {
    let here = document.getElementById('li-' + pageName)
    let wasHere = document.getElementsByClassName("here");
    for (let i = 0; i < wasHere.length; i++) {
        wasHere[i].classList.remove("here");
    }
    here.className += "here";
    let page = document.getElementById("page");
    let pageholder = page.parentElement;
    let parser = new DOMParser();
    readHTMLFile("/" + pageName + ".html", function (text) {
        var parsedPage = parser.parseFromString(text, "text/html");
        pageholder.removeChild(page);
        pageholder.append(parsedPage.getElementById('page'));
        var pageTitle = parsedPage.getElementsByTagName("title")[0].innerHTML
        document.title = pageTitle;
        if (!isBack) {
            var pageURL = pageName == 'main' ? '' : pageName
            history.pushState(pageName, null, "/" + pageURL);
        }
        isBack = false;
        generate(pageName);
    });
}

function generateTeam() {
    let team = document.getElementById("team");
    readTextFile("/json/team.json", function (text) {
        var teamJSON = JSON.parse(text);
        for (let i = 0; i < teamJSON.positions.length; i++) {
            var teamGroup = document.createElement('div');
            teamGroup.id = "team-" + (i + 1);
            teamGroup.className = "team-group"
            var teamGroupHeader = document.createElement('h2');
            teamGroupHeader.innerHTML = "<span>" + teamJSON.positions[i] + "</span>";
            var teamElementsContainer = document.createElement('div');
            teamElementsContainer.className = "team-elements-container";
            teamGroup.appendChild(teamGroupHeader);
            teamGroup.appendChild(teamElementsContainer);
            team.appendChild(teamGroup);
        }
        for (let i = 0; i < teamJSON.team.length; i++) {
            var teamElement = document.createElement('div');
            teamElement.className = "team-element";
            var teamInfo = document.createElement('div');
            var img = document.createElement('img');
            img.src = "/images/team/" + teamJSON.team[i].picture;
            img.alt = "face";
            var fio = document.createElement('h3');
            fio.innerText = teamJSON.team[i].full_name;
            var description = document.createElement('p');
            description.innerText = teamJSON.team[i].description;
            var email = document.createElement('p');
            email.innerText = teamJSON.team[i].email;
            teamInfo.appendChild(fio);
            teamInfo.appendChild(description);
            teamInfo.appendChild(email);
            // if (teamJSON.team[i].text) {
            //     var text = document.createElement('p');
            //     text.className = "quote"
            //     text.innerText = "«" + teamJSON.team[i].text + "»";
            //     teamInfo.appendChild(text);
            // }
            teamElement.appendChild(img);
            teamElement.appendChild(teamInfo);
            var teamGroup = document.getElementById("team-" + teamJSON.team[i].position);
            teamGroup.getElementsByClassName("team-elements-container")[0].appendChild(teamElement);
        }
    });
}

function generatePartners() {
    let partners = document.getElementById("partners");
    readTextFile("/json/partners.json", function (text) {
        var partnersJSON = JSON.parse(text);
        for (let i = 0; i < partnersJSON.length; i++) {
            var partner = document.createElement('div');
            var a = document.createElement('a');
            a.href = partnersJSON[i].site;
            a.target = '_blank';
            var img = document.createElement('img');
            img.src = "/images/logos/" + partnersJSON[i].logo;
            img.alt = "logo";
            var description = document.createElement('p');
            description.innerText = partnersJSON[i].partner;
            a.appendChild(description);
            partner.appendChild(img);
            partner.appendChild(a);
            partners.appendChild(partner);
        }
    });
}


function generateContacts() {
    let contacts = document.getElementById("contacts");
    readTextFile("/json/contacts.json", function (text) {
        var contactsJSON = JSON.parse(text);
        for (let i = 0; i < contactsJSON.length; i++) {
            var contact = document.createElement('div');
            var img = document.createElement('img');
            img.src = "/images/contacts/" + contactsJSON[i].logo;
            img.alt = contactsJSON[i].name;
            var a = document.createElement('a');
            var span = document.createElement('span');
            a.href = contactsJSON[i].link;
            a.target = '_blank';
            span.innerText = contactsJSON[i].text;
            a.appendChild(img);
            contact.appendChild(a);
            contact.appendChild(span);
            contacts.appendChild(contact);
        }
    });
}


function generateGallery() {
    let gallery = document.getElementById("gallery");
    readTextFile("/json/gallery.json", function (text) {
        var galleryJSON = JSON.parse(text);
        for (let i = 0; i < galleryJSON.length; i++) {

        }
    });
}

function generateJoinForm() {
    let joinFormSpans = document.querySelectorAll("div#join form span");
    for (let i = 0; i < joinFormSpans.length; i++) {
        let span = joinFormSpans[i];
        let input = span.parentElement.querySelectorAll("input")[0];
        span.style.left = coors(input).left + 10 + "px";
        span.style.top = coors(input).top - 8 + "px";
    }
}

function joinSelected(select, flag) {
    select.disabled = flag;
    select.className = flag? "ok" : "";
    document.getElementById(select.id + "-f5").className = flag? "f5 f5active" : "f5";
    if (!flag) {
        select.selectedIndex = 0;
    }
}

function generate(pageName) {
    switch (pageName) {
        case 'main':
            generateGallery();
            break;
        case 'team':
            generateTeam();
            break;
        case 'partners':
            generatePartners();
            break;
        case 'contacts':
            generateContacts();
            break;
        case 'join':
            generateJoinForm();
        default:
            break;
    }
}