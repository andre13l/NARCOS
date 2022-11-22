const unsuspendUser = (elem, id, reportId) => {
    const url = '/user/'+ id + '/unsuspend';
    sendAjaxRequest('put', url, null, suspensionHandler(elem));
}

const suspendUser = (id, reportId) =>  {
    const reason = select("#reason").value;
    const end_time = select("#suspensionEndTime").value;
    const btn = select("#suspendBtn");

    const url = '/user/'+ id + '/suspend';
    sendAjaxRequest('post', url, {reason, end_time}, suspendHandler(btn, reportId));
}

const closeReport = (elem, id) => {
    const url = '/admin/reports/'+ id + '/close';
    sendAjaxRequest('put', url, null, suspensionHandler(elem));
}


const toggleSuspendPopup = (userId, reportId) => {

    const reportContainer = select('#reportElement');

    if (!reportContainer.classList.contains('d-none')) {
        select('textarea[id=reason]').value = '';
        const errorContainer = select('#reportError');
        errorContainer.classList.add('d-none');
    }

    const btn = select("#suspendBtn");
    btn.onclick = () => suspendUser(userId, reportId);

    console.log(btn);
    
    toggleElem(reportContainer);
}


const suspensionHandler = (elem) => function(){

    if (this.status == 403) {
        window.location = '/login';
        return;
    }

    const previousError = elem.querySelector('.error');

    if (this.status == 400) {
        const error = createErrorMessage(JSON.parse(this.responseText).errors);

        if (previousError)
            previousError.replaceWith(error);
        else
            elem.appendChild(error);

        return;
    }

    if (previousError) previousError.remove();

    const confirmation = document.createElement('h4');
    confirmation.classList.add('mb-0');
    confirmation.innerHTML = JSON.parse(this.responseText).msg;
    
    elem.parentElement.replaceWith(confirmation);
}

const suspendHandler = (elem, reportId) => function(){

    if (this.status == 403) {
        window.location = '/login';
        return;
    }


    const previousError = elem.querySelector('.error');

    if (this.status == 400) {
        const error = createErrorMessage(JSON.parse(this.responseText).errors);

        if (previousError)
            previousError.replaceWith(error);
        else
            elem.insertAdjacentElement('afterend', error);

        return;
    }

    if (previousError) 
        previousError.remove();


    const confirmation = document.createElement('h4');
    confirmation.classList.add('mb-0');
    confirmation.innerHTML = JSON.parse(this.responseText).msg;
    
    elem.replaceWith(confirmation);

    const closeReportBtn = select("#closeReport-" + reportId);
    closeReport(closeReportBtn, reportId);
}
