<?php
if (!defined('ABSPATH')) {
    exit;
}

function nstm_concepts_setup() {
    add_theme_support('title-tag');
    add_theme_support('html5', array('style', 'script', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'nstm_concepts_setup');

function nstm_concepts_assets() {
    $theme = wp_get_theme();
    wp_enqueue_style('nstm-concepts', get_stylesheet_uri(), array(), $theme->get('Version'));
    wp_enqueue_script('nstm-concepts', get_template_directory_uri() . '/assets/site.js', array(), $theme->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'nstm_concepts_assets');

function nstm_render_concept_page($variant = 'a') {
    $is_a = $variant === 'a';
    $other_url = home_url($is_a ? '/design-b/' : '/design-a/');
    $other_label = $is_a ? 'B案を見る' : 'A案を見る';
    $concept_label = $is_a ? 'A案 / DARK PHOTOGRAPHIC' : 'B案 / LIGHT JOURNAL';
    ?>
    <div class="nstm-site nstm--<?php echo esc_attr($variant); ?>">
      <header class="nstm-header">
        <div class="nstm-header__inner">
          <a class="nstm-logo" href="#top" aria-label="NSTM ページ先頭へ">
            <span class="nstm-logo__mark">NSTM</span>
            <span class="nstm-logo__text">日鉄物産マテックス株式会社<br>KOHLER 日本正規輸入代理店</span>
          </a>
          <button class="nstm-menu-toggle" type="button" aria-expanded="false" aria-controls="nstm-nav"><span></span><span></span><span></span><span class="nstm-sr-only">メニューを開く</span></button>
          <nav class="nstm-nav" id="nstm-nav" aria-label="メインナビゲーション">
            <a href="#promise">品質の約束</a>
            <a href="#support">プロジェクトサポート</a>
            <a href="#projects">納入実績</a>
            <a href="#company">会社情報</a>
            <a href="#contact">お問い合わせ</a>
            <a class="nstm-nav__switch" href="<?php echo esc_url($other_url); ?>"><?php echo esc_html($other_label); ?></a>
            <a class="nstm-nav__external" href="https://www.kohler.jp/" target="_blank" rel="noopener">KOHLER公式サイト</a>
          </nav>
        </div>
      </header>

      <main>
        <section class="nstm-hero" id="top">
          <div class="nstm-hero__inner">
            <div class="nstm-hero__copy">
              <span class="nstm-kicker"><?php echo esc_html($concept_label); ?></span>
              <h1 class="nstm-hero__title">日本の現場に<br>届くまでが、<br>私たちの品質です。</h1>
              <p class="nstm-hero__lead">KOHLER 日本正規輸入代理店<br>日鉄物産マテックス株式会社</p>
              <a class="nstm-button" href="#contact">プロジェクトについて相談する</a>
            </div>
            <div class="nstm-hero__proof"><span>QUALITY</span><span>SUPPORT</span><span>MAINTENANCE</span><span>FOR JAPAN</span></div>
          </div>
        </section>

        <section class="nstm-section" id="promise">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">02 / QUESTIONS</span>
              <div>
                <h2 class="nstm-section__heading">輸入品だからこそ、<br>こんな不安はありませんか？</h2>
                <p class="nstm-section__intro">商品を選ぶ前に、日本で使い続けられるかを確かめたい。その声に、検査と支援の記録でお答えします。</p>
              </div>
            </div>
            <div class="nstm-anxieties">
              <?php
              $anxieties = array(
                  array('初期不良が<br>出ないか心配', '水漏れ・傷・仕上げのばらつき', '国内品質目線の受入検品'),
                  array('日本の納まりに<br>合うか不安', '配管・寸法・規格の違い', '承認図と納まり検討'),
                  array('職人が施工<br>できるか分からない', '初めて扱う製品、日本語資料の不足', '施工指導と現場説明'),
                  array('壊れたら<br>直せるか不安', '部品の供給と修理の窓口', '全国メンテナンス網'),
              );
              foreach ($anxieties as $index => $item) : ?>
                <article class="nstm-anxiety">
                  <span class="nstm-anxiety__index">0<?php echo esc_html($index + 1); ?></span>
                  <h3><?php echo wp_kses_post($item[0]); ?></h3>
                  <p><?php echo esc_html($item[1]); ?></p>
                  <span class="nstm-anxiety__answer"><?php echo esc_html($item[2]); ?></span>
                </article>
              <?php endforeach; ?>
            </div>
          </div>
        </section>

        <section class="nstm-section nstm-stats">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">03 / EVIDENCE</span>
              <div><h2 class="nstm-section__heading">品質を、主張ではなく<br>数字と記録でお見せします。</h2></div>
            </div>
            <div class="nstm-stats__grid">
              <?php
              $stats = array(
                  array('年間検品点数', '約12,000', '点'),
                  array('検査項目数', '50', '項目以上'),
                  array('KOHLER取扱年数', '30', '年以上'),
                  array('全国メンテナンス', '20', '拠点'),
                  array('国内在庫品番数', '集計中', ''),
              );
              foreach ($stats as $item) : ?>
                <div class="nstm-stat"><span class="nstm-stat__label"><?php echo esc_html($item[0]); ?></span><span class="nstm-stat__value"><?php echo esc_html($item[1]); ?><small class="nstm-stat__unit"><?php echo esc_html($item[2]); ?></small></span></div>
              <?php endforeach; ?>
            </div>
            <p class="nstm-provisional">※ 数値はデザイン確認用の仮値を含みます。公開前に確定データへ差し替えます。</p>
          </div>
        </section>

        <section class="nstm-lab">
          <div class="nstm-container nstm-lab__inner">
            <div class="nstm-lab__copy">
              <span class="nstm-lab__badge">プロジェクト対象</span>
              <span class="nstm-kicker">04 / DOMESTIC LAB</span>
              <h2>国内ラボで、<br>現場の条件を再現する。</h2>
              <p>実際の水圧・流量・組み合わせを確認。施工前に不確定要素を減らし、納まりと使い勝手を検証します。</p>
              <a class="nstm-button" href="#support">検証と支援の内容を見る</a>
            </div>
          </div>
        </section>

        <section class="nstm-section nstm-support" id="support">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">05 / TOTAL SUPPORT</span>
              <div><h2 class="nstm-section__heading">すべての製品に共通する約束。<br>案件ごとに組み立てる支援。</h2></div>
            </div>
            <div class="nstm-support__layers">
              <article class="nstm-layer">
                <div class="nstm-layer__label"><span>品質の約束</span><span>全製品共通</span></div>
                <h3>どこで選んでも、日本のKOHLERは私たちが品質を見ます。</h3>
                <p>輸入から受入検品、注意事項の明記、保証、部品供給、修理受付まで。日本で使い続けるための土台です。</p>
                <ul><li>受入検品</li><li>注意事項の明記</li><li>日本語施工資料</li><li>保証・部品・修理</li><li>メンテナンス網</li><li>品質記録</li></ul>
              </article>
              <article class="nstm-layer nstm-layer--project">
                <div class="nstm-layer__label"><span>プロジェクトサポート</span><span>案件限定</span></div>
                <h3>設計から施工、運用準備まで。</h3>
                <p>プロジェクトごとの条件に合わせ、必要な支援をご相談のうえで組み立てます。</p>
                <ul><li>通水検証</li><li>納まり検討</li><li>製品選定</li><li>初回施工立会い</li><li>施工説明会</li><li>予備品リスト</li></ul>
              </article>
            </div>
          </div>
        </section>

        <section class="nstm-section nstm-projects" id="projects">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">06 / PROJECTS</span>
              <div><h2 class="nstm-section__heading">日本各地のプロジェクトで、<br>調達から運用までを支えています。</h2></div>
            </div>
            <div class="nstm-projects__layout">
              <article class="nstm-project-feature"><div class="nstm-project-feature__copy"><small>HOSPITALITY / TOKYO</small><h3>都心大型ホテル</h3><p>500室規模・水まわり機器の納入と運用準備</p></div></article>
              <div class="nstm-project-list">
                <article class="nstm-project-card"><small>RESIDENCE</small><strong>ラグジュアリーレジデンス</strong><span>120戸規模 / 設計協力・納まり検討</span></article>
                <article class="nstm-project-card"><small>COMMERCIAL</small><strong>複合商業施設</strong><span>大型開発 / 検品・施工説明</span></article>
                <article class="nstm-project-card"><small>RESORT</small><strong>ウェルネスリゾート</strong><span>プール・スパ / 部品・保守計画</span></article>
              </div>
            </div>
            <p class="nstm-provisional">※ 案件名・規模はデザイン確認用のダミーです。</p>
          </div>
        </section>

        <section class="nstm-section">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">07 / KOHLER OFFICIAL</span>
              <div><h2 class="nstm-section__heading">選ぶための情報は、<br>KOHLER公式サイトへ。</h2></div>
            </div>
            <div class="nstm-gateways">
              <?php
              $gateways = array(
                  array('01', '商品情報', 'カテゴリ・品番・スペックから製品を探す'),
                  array('02', 'カタログ・図面', 'PDFカタログ、CAD、BIM、承認図を確認する'),
                  array('03', 'ショールーム', '実際の製品を見て、触れて、選ぶ'),
              );
              foreach ($gateways as $item) : ?>
                <a class="nstm-gateway" href="https://www.kohler.jp/" target="_blank" rel="noopener"><span class="nstm-gateway__mark"><?php echo esc_html($item[0]); ?></span><h3><?php echo esc_html($item[1]); ?></h3><p><?php echo esc_html($item[2]); ?></p><span class="nstm-gateway__link">KOHLER公式サイトへ</span></a>
              <?php endforeach; ?>
            </div>
          </div>
        </section>

        <section class="nstm-group" id="company">
          <div class="nstm-group__image" role="img" aria-label="検査記録と精密測定の様子"></div>
          <div class="nstm-group__copy">
            <span class="nstm-kicker">08 / CONTINUITY</span>
            <h2>検査の文化と、<br>事業を続ける力。</h2>
            <p>品質を支えるのは、一度限りの技術ではなく、毎日の検査と記録の蓄積です。注意事項を製品に添え、日本の現場でつまずくポイントを次に活かします。</p>
            <p>日鉄グループの一員として、供給とメンテナンスを長期に継続できる体制を築いています。</p>
            <div class="nstm-group__principles"><div class="nstm-group__principle"><span>記録を残す</span><span>INSPECT</span></div><div class="nstm-group__principle"><span>経験を次に活かす</span><span>LEARN</span></div><div class="nstm-group__principle"><span>供給を続ける</span><span>CONTINUE</span></div></div>
          </div>
        </section>

        <section class="nstm-section nstm-contact" id="contact">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">09 / CONTACT</span>
              <div><h2 class="nstm-section__heading">何に困っているかを、<br>お選びください。</h2><p class="nstm-section__intro">用件に合わせて必要な項目だけをご案内し、適切な担当者へ直接おつなぎします。</p></div>
            </div>
            <div class="nstm-contact__grid">
              <a class="nstm-contact-card" href="#"><span class="nstm-contact-card__number">01</span><h3>プロジェクトでの<br>採用を検討している</h3><p>構想、仕様検討、納まり、見積など</p><span>相談内容を入力する →</span></a>
              <a class="nstm-contact-card" href="#"><span class="nstm-contact-card__number">02</span><h3>仕様・図面・<br>技術資料が必要</h3><p>品番、承認図、施工要領など</p><span>資料を依頼する →</span></a>
              <a class="nstm-contact-card" href="#"><span class="nstm-contact-card__number">03</span><h3>在庫・納期・価格を<br>確認したい</h3><p>国内在庫、輸入リードタイム、数量など</p><span>在庫・納期を聞く →</span></a>
              <a class="nstm-contact-card" href="#"><span class="nstm-contact-card__number">04</span><h3>修理・部品・<br>メンテナンス</h3><p>製品品番、設置状況、不具合の症状など</p><span>修理を相談する →</span></a>
            </div>
          </div>
        </section>
      </main>

      <footer class="nstm-footer"><div class="nstm-container nstm-footer__inner"><span>NSTM / 日鉄物産マテックス株式会社</span><span>デザイン検討用モックアップ</span></div></footer>
    </div>
    <?php
}

