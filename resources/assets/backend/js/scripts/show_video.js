(function (v, i, d, e, o) {
    v[o] = v[o] || {
        add: function V(a) {
            (v[o].d = v[o].d || []).push(a)
        }
    };
    if (!v[o].l) {
        v[o].l = 1 * new Date();
        a = i.createElement(d);
        m = i.getElementsByTagName(d)[0];
        a.async = 1;
        a.src = e;
        m.parentNode.insertBefore(a, m);
    }
})(window, document, "script", "https://cdn-gce.vdocipher.com/playerAssets/1.6.10/vdo.js", "vdo");

if (playback_info.length > 0) {
    vdo.add({
        otp: otp,
        playbackInfo: playback_info,
        theme: "9ae8bbe8dd964ddc9bdb932cca1cb59a", //"v1/uz26s6vinap", //"9ae8bbe8dd964ddc9bdb932cca1cb59a", //"9111e0056d664282b368c5558a36f32a"
        container: document.querySelector("#embedBox"),
        // startTime: video_start_time,
        autoplay: false
        // fullscreen: false,
        // loop: true,
    });
}
