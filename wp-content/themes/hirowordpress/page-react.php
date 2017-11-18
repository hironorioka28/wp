<?php get_header(); ?>

<div class="page__contents">
  <section class="reactTest">
    <h1 class="reactTest__title">Reaaaact</h1>
    <main class="reactTest__main">
      <div class="react">
        <div id="app"></div>
        <script type="text/jsx">
          // 親：<Parent />の定義
          var Parent = React.createClass({
            // State（状態は親が管理）
            // この値はブラウザを閉じたり、リロードするまでは保持される
            getInitialState: function () {
              return {
                textVal: "",
                children: []
              };
            },

            // State(textVal)を変更
            setStateTextVal: function(textVal) {
              this.setState({ textVal: textVal }); 
            },

            // State(children)を変更
            setStateChildren: function(textVal) {
              var textVals = this.state.children.concat(textVal);
              this.setState({ children: textVals });
            },

            // <Parent />の表示
            // ここで子となる<ChildInput />と<Child />を記述
            render: function() {
              return (
                <div className="react__form">
                  <p className="react__text">入力してEnterキーを押す</p>
                  <ChildInput onChange={this.setStateTextVal} onSave={this.setStateChildren} />
                  <Child textVal={this.state.textVal} children={this.state.children} />
                </div>
              );
            }
          });

          // 子1：<ChildInput />の定義（props経由で親を参照できる）
          var ChildInput = React.createClass({
            _onChange: function (e) {
              this.props.onChange(e.target.value);
            },

            _onKeyDown: function (e) {
              if (e.keyCode === 13) { // Enterキー
                this.props.onSave(e.target.value);
                e.target.value = "";
              }
            },

            // <ChildInput />の表示
            render: function() {
              return <input className="react__inputText" type="text" onChange={this._onChange} onKeyDown={this._onKeyDown} />;
            }
          });

          // 子2：<Child />の定義（props経由で親を参照できる）
          var Child = React.createClass({
            // <Child />の表示
            render: function() {
              var key = 0;
              var textVals = this.props.children.map(function (textVal) {
                // 時間が同じ。つまり、キーが押されるごとに、まとめて再描画されていることに注目
                //（サーバーサイドっぽいと言われる所以）
                var date = new Date().toString();
                return <li className="reactList__item" key={key++}>{key}.{textVal}({date})</li>;
              });

              return (
                <div className="react__result">
                  <p className="react__text">{this.props.textVal}</p>
                  <div className="react__list">
                    <ul className="reactList">{textVals}</ul>
                  </div>
                </div>
              );
            }
          });
          // id='app' に <Parent />を表示する（マウント）
          var m = React.render(<Parent />, document.getElementById('app'));
        </script>
      </div>
    </main>
  </section>
</div><!-- /.page__contents -->

<script src="http://fb.me/react-0.13.3.js"></script>
<script src="http://fb.me/JSXTransformer-0.13.3.js"></script>

<?php get_footer(); ?>
