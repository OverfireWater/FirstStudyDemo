function showMessage(message, type, time) {
    let str = ''
    switch (type) {
        case 'success':
            str = '<div class="success-message" style="width: 250px;height: 40px;text-align: center;background-color:#daf5eb;;color: rgba(59,128,58,0.7);position: fixed;left: 43%;top: 10%;line-height: 40px;border-radius: 5px;z-index: 9999">\n' +
                '    <span class="mes-text">' + message + '</span></div>'
            break;
        case 'error':
            str = '<div class="error-message" style="width: 250px;height: 40px;text-align: center;background-color: #ffffff;color: rgba(255,36,36,0.8);font-size:18px ;position: fixed;left: 43%;top: 10%;line-height: 40px;border-radius: 10px;z-index: 9999">\n' +
                '    <span class="mes-text">' + message + '</span></div>'
    }
    $('body').append(str)
    setTimeout(function () {
        $('.' + type + '-message').remove()
    }, time)
}
