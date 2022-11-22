const shortcutFollowUser = (elem, id) => {
    sendAjaxRequest('post', `/user/${id}/follow`, null, shortcutFollowHandler(elem));
}

const shortcutUnfollowUser = (elem, id) => {
    sendAjaxRequest('post', `/user/${id}/unfollow`, null, shortcutUnfollowHandler(elem));
}

const followUser = (id) => {
    sendAjaxRequest('post', `/user/${id}/follow`, null, followUserHandler);
}

const unfollowUser = (id) => {
    sendAjaxRequest('post', `/user/${id}/unfollow`, null, unfollowUserHandler);
}


const shortcutFollowHandler = (elem) => function () {
    const res = JSON.parse(this.responseText);
    elem.className = "btn btn-primary my-0 py-0 me-3";
    elem.innerHTML = 'Following';
    elem.onclick = () => shortcutUnfollowUser(elem, res.id);
}

const shortcutUnfollowHandler = (elem) => function () {
    const res = JSON.parse(this.responseText);
    elem.className = "btn btn-primary my-0 py-0 me-3";
    elem.innerHTML = 'Follow';
    elem.onclick = () => shortcutFollowUser(elem, res.id);
}

function followUserHandler() {
    const res = JSON.parse(this.responseText);
    if (res.status == 'OK') {
        const button = select('#followBtn');
        button.className = "btn btn-secondary px-lg-5 my-0 py-0 mx-3";
        button.innerHTML = 'Unfollow';
        button.onclick = () => unfollowUser(res.id);
        select('#followersCount').innerHTML++;
    }
}

function unfollowUserHandler() {
    const res = JSON.parse(this.responseText);
    if (res.status == 'OK') {
        const button = select('#followBtn');
        button.className = "btn btn-primary px-lg-5 my-0 py-0 mx-3";
        button.innerHTML = 'Follow';
        button.onclick = () => followUser(res.id);
        select('#followersCount').innerHTML--;
    }
}

const toggleReportPopup = () => {
    
    const reportContainer = select('#reportElement');
    
    if (!reportContainer.classList.contains('d-none')) {
        select('textarea[id=reason]').value = '';
        const errorContainer = select('#reportError');
        errorContainer.classList.add('d-none');
    }

    toggleElem(reportContainer);
}

const reportUser = (id) => {
    const reportReason = select('textarea[id=reason]').value;
    sendAjaxRequest('post', `/user/${id}/report`, {reason: reportReason}, reportUserHandler);
}

function reportUserHandler() {
    const res = JSON.parse(this.responseText);
    if (res.status == 'OK') {
        toggleReportPopup();
    } else if (res.msg){
        const errorContainer = select('#reportError');
        select('#reportErrorText').innerHTML = res.msg;
        errorContainer.classList.remove('d-none');

    } else {
        const errorContainer = select('#reportError');
        select('#reportErrorText').innerHTML = 'Failed to report user. Invalid request.';
        errorContainer.classList.remove('d-none');
    }
}

const imgInput = select('#imgInput');
if (imgInput) {
    imgInput.onchange = evt => {
        const [file] = imgInput.files
        if (file) {
            select('#avatarPreview').src = URL.createObjectURL(file)
        }
    }
}
