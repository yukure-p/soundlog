"use strict";

// mediaクエリ情報
const mediaQueryList = matchMedia('(min-width:767px)'); 

// mediaクエリが変更されたタイミングで処理
mediaQueryList.addListener(onMediaQueryChange);

function onMediaQueryChange(){

    if( mediaQueryList.matches === true ){  //pc

        // フォームデータの取得
        const fetchForm = document.querySelector('.fetchForm');
        console.log('配列データの確認' ,fetchForm);
        const btn = document.getElementById("searchsubmit");
        // console.log(btn);
        const cbox = document.querySelectorAll('.check-box');
        // console.log('配列データの確認' ,cbox);
        cbox.forEach(function (cboxfe){
            // console.log('チェックボックス確認' ,cboxfe);
            cboxfe.addEventListener('click', () => {
                setTimeout(function() {
                    btn.click();
                }, 1000);
            });
        });
        btn.addEventListener('click', (event) => {
            event.preventDefault();
            // フォームデータを新規に作成
            let fd = new FormData(fetchForm);
            // フォームデータにデータ追加
            fd.append('action', 'ajax_func');
            // フェッチ
            fetch('http://soundlog/wp/wp-admin/admin-ajax.php', {
                method: 'POST', 
                body: fd,
            })
            // レスポンスデータ
            .then(res => {
                console.log(res);
                return res.text();
            })
            .then((docu) => {
                // DOMParserを新規作成
                const parser = new DOMParser();
                // textをhtmlに変換
                const html = parser.parseFromString(docu, "text/html");
                const set = html.querySelector('body');
                // console.log(set);
                const Nbox = set.innerHTML;
                const dom = document.createElement('div');
                dom.innerHTML = Nbox;
                const results = document.getElementById("result");
                results.innerHTML = dom.innerHTML;

                // 遅延読み込み
                const $lazy = document.querySelectorAll(".l-box,.delay-load");
                const options = {
                  root: null,
                  // 今回はビューポートをルート要素とする
                  rootMargin: "0px 0px -200px 0px",
                  // ビューポートの中心を判定基準にする
                  threshold: 0 // 閾値は0
                }; // inViewportは関数　optionsはオプション
                const io = new IntersectionObserver(inViewport, options);
                Array.from($lazy).forEach(function (element) {
                  io.observe(element);
                });
                function inViewport(entries) {
                  // 交差検知をしたもののなかで、isIntersectingがtrueのDOMを色を変える関数に渡す
                  entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                      const img = entry.target;
                      img.addEventListener("load", function () {
                        img.classList.add("is-delay-load");
                      });
                      const lb = entry.target;
                      lb.classList.add("is-l-box");
                      const imgEl = entry.target;
                      imgEl.src = imgEl.dataset.src;
                    }
                  });
                }
                function doWhenIntersect(entries) {
                  // 交差検知をしたもののなかで、isIntersectingがtrueのDOMを色を変える関数に渡す
                  entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                      activateIndex(entry.target);
                    }
                  });
                }
            })
            .catch(error => {
                console.log(error); // エラー表示
            });      
        }); 

    } else{ //sp

        // フォームデータの取得
        const fetchForm = document.querySelector('.fetchForms');
        // console.log('配列データの確認' ,fetchForm);
        const btn = document.getElementById("searchsubmits");
        // console.log(btn);
        const cbox = document.querySelectorAll('.check-box');
        // console.log('配列データの確認' ,cbox);
        const body = document.querySelector('body');
        cbox.forEach(function (cboxfe){
            // console.log('チェックボックス確認' ,cboxfe);
            cboxfe.addEventListener('click', () => {
                setTimeout(function() {
                    body.classList.add('is-load');
                    btn.click();
                }, 1000);
            });
        });
        btn.addEventListener('click', (event) => {
            event.preventDefault();
            // フォームデータを新規に作成
            let fd = new FormData(fetchForm);
            // フォームデータにデータ追加
            fd.append('action', 'ajax_func');
            // フェッチ
            fetch('myValues.ajax_url', {
                method: 'POST', 
                body: fd,
            })
            // レスポンスデータ
            .then(res => {
                console.log(res);
                return res.text();
            })
            .then((docu) => {
                // DOMParserを新規作成
                const parser = new DOMParser();
                // textをhtmlに変換
                const html = parser.parseFromString(docu, "text/html");
                console.log(html);
                const number = html.querySelector('.number');
                console.log(number);
                const num = number.textContent;
                const result = document.querySelector('.num');
                console.log(result);
                result.textContent = num
                const set = html.querySelector('body');
                // console.log(set);
                const Nbox = set.innerHTML;
                const dom = document.createElement('div');
                dom.innerHTML = Nbox;
                const results = document.getElementById("result");
                results.innerHTML = dom.innerHTML;
                body.classList.remove('is-load');
                // 遅延読み込み
                const $lazy = document.querySelectorAll(".l-box,.delay-load");
                const options = {
                  root: null,
                  // 今回はビューポートをルート要素とする
                  rootMargin: "0px 0px -200px 0px",
                  // ビューポートの中心を判定基準にする
                  threshold: 0 // 閾値は0
                }; // inViewportは関数　optionsはオプション
                const io = new IntersectionObserver(inViewport, options);
                Array.from($lazy).forEach(function (element) {
                  io.observe(element);
                });
                function inViewport(entries) {
                  // 交差検知をしたもののなかで、isIntersectingがtrueのDOMを色を変える関数に渡す
                  entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                      const img = entry.target;
                      img.addEventListener("load", function () {
                        img.classList.add("is-delay-load");
                      });
                      const lb = entry.target;
                      lb.classList.add("is-l-box");
                      const imgEl = entry.target;
                      imgEl.src = imgEl.dataset.src;
                    }
                  });
                }
                function doWhenIntersect(entries) {
                  // 交差検知をしたもののなかで、isIntersectingがtrueのDOMを色を変える関数に渡す
                  entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                      activateIndex(entry.target);
                    }
                  });
                }
            })
            .catch(error => {
                console.log(error); // エラー表示
            });      
        }); 
    }

}
// ページ表示時に一度onMediaQueryChangeを実行しておく
onMediaQueryChange(mediaQueryList);

 






