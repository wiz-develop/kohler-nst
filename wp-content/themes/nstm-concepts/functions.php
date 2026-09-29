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
            <a href="#projects">プロジェクト対応</a>
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
              <span class="nstm-kicker">KOHLER 日本正規輸入代理店</span>
              <h1 class="nstm-hero__title">日本の現場に<br>届くまでが、<br>私たちの品質です。</h1>
              <p class="nstm-hero__lead">KOHLER 日本正規輸入代理店<br>日鉄物産マテックス株式会社</p>
              <a class="nstm-button" href="#contact">プロジェクトについて相談する</a>
            </div>
            <div class="nstm-hero__proof"><span>正規輸入</span><span>国内での検品</span><span>施工・修理のご相談</span><span>日本全国のメンテナンス網</span></div>
          </div>
        </section>

        <section class="nstm-section" id="promise">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">輸入製品の不安</span>
              <div>
                <h2 class="nstm-section__heading">輸入品だからこそ、<br>こんな不安はありませんか？</h2>
                <p class="nstm-section__intro">海外製品を日本の現場で安心して採用し、長く使い続けていただくために。輸入から施工、修理まで、国内で必要になる対応を一つずつ整えています。</p>
              </div>
            </div>
            <div class="nstm-anxieties">
              <?php
              $anxieties = array(
                  array('初期不良が<br>心配', '水漏れや傷などを、設置前に確認できるか', '国内倉庫で受入検品を実施'),
                  array('日本の設備に<br>合うか不安', '配管や規格の違いに対応できるか', '日本での使用に適した仕様へ調整'),
                  array('施工方法が<br>分からない', '初めて扱う製品でも施工できるか', '施工方法と技術資料をご案内'),
                  array('故障したときに<br>修理できるか不安', '相談窓口や交換部品が確保されているか', '修理受付と国内メンテナンス網'),
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
              <span class="nstm-section__number">国内の対応体制</span>
              <div><h2 class="nstm-section__heading">日本で使い続けるための体制を、<br>具体的にお伝えします。</h2></div>
            </div>
            <div class="nstm-stats__grid">
              <?php
              $stats = array(
                  array('会社設立', '2004', '年'),
                  array('メンテナンス提携先', '64', '社'),
                  array('メンテナンス網', '39', '都道府県'),
                  array('正規輸入品の保証', '最大2', '年間'),
                  array('品質・環境マネジメント', 'ISO', '9001 / 14001'),
              );
              foreach ($stats as $item) : ?>
                <div class="nstm-stat"><span class="nstm-stat__label"><?php echo esc_html($item[0]); ?></span><span class="nstm-stat__value"><?php echo esc_html($item[1]); ?><small class="nstm-stat__unit"><?php echo esc_html($item[2]); ?></small></span></div>
              <?php endforeach; ?>
            </div>
            <p class="nstm-provisional">※ メンテナンス網は2026年9月現在。保証期間は製品により異なります。</p>
          </div>
        </section>

        <section class="nstm-lab">
          <div class="nstm-container nstm-lab__inner">
            <div class="nstm-lab__copy">
              <span class="nstm-lab__badge">プロジェクト対象</span>
              <span class="nstm-kicker">国内での通水確認</span>
              <h2>施工前に、<br>水圧・流量を確かめる。</h2>
              <p>案件の条件に応じて、実機を使った通水確認を行います。水圧・流量や製品の組み合わせを施工前に確認し、設計・施工上の懸念を整理します。</p>
              <a class="nstm-button" href="#support">検証と支援の内容を見る</a>
            </div>
          </div>
        </section>

        <section class="nstm-section nstm-support" id="support">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">サポート</span>
              <div><h2 class="nstm-section__heading">正規輸入品の安心と、<br>案件に合わせた支援を。</h2></div>
            </div>
            <div class="nstm-support__layers">
              <article class="nstm-layer">
                <div class="nstm-layer__label"><span>品質の約束</span><span>全製品共通</span></div>
                <h3>日鉄物産マテックスが輸入・販売する製品を、国内で支えます。</h3>
                <p>正規ルートでお買い求めいただいた製品を対象に、受入検品、保証、部品供給、施工方法のご案内、修理受付を行います。</p>
                <ul><li>受入検品</li><li>注意事項の明記</li><li>日本語施工資料</li><li>保証・部品・修理</li><li>メンテナンス網</li><li>品質記録</li></ul>
              </article>
              <article class="nstm-layer nstm-layer--project">
                <div class="nstm-layer__label"><span>プロジェクトサポート</span><span>案件限定</span></div>
                <h3>ホテルやレジデンスなどの計画を、設計段階から支援します。</h3>
                <p>製品選定、価格・納期の調整、納まり検討、施工支援など、案件の条件に合わせて対応します。</p>
                <ul><li>通水検証</li><li>納まり検討</li><li>製品選定</li><li>初回施工立会い</li><li>施工説明会</li><li>予備品リスト</li></ul>
              </article>
            </div>
          </div>
        </section>

        <section class="nstm-section nstm-projects" id="projects">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">プロジェクト対応</span>
              <div><h2 class="nstm-section__heading">建物と工程に合わせて、<br>製品の採用を支援します。</h2></div>
            </div>
            <div class="nstm-projects__layout">
              <article class="nstm-project-feature"><div class="nstm-project-feature__copy"><small>ホテル・レジデンス</small><h3>計画に必要な条件を、<br>一つずつ整えます。</h3><p>空間の意匠、必要数量、工期、施工条件を確認し、製品選定から納入まで支援します。</p><small class="nstm-image-note">※ 写真はイメージです。</small></div></article>
              <div class="nstm-project-list">
                <article class="nstm-project-card"><small>設計段階</small><strong>製品選定・仕様確認</strong><span>意匠、機能、国内での使用条件を確認します。</span></article>
                <article class="nstm-project-card"><small>調達段階</small><strong>価格・納期の調整</strong><span>数量と工程に合わせて、調達条件を整理します。</span></article>
                <article class="nstm-project-card"><small>施工段階</small><strong>納まり・施工支援</strong><span>資料のご案内や施工方法のご相談に対応します。</span></article>
              </div>
            </div>
          </div>
        </section>

        <section class="nstm-section">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">商品を探す</span>
              <div><h2 class="nstm-section__heading">選ぶための情報は、<br>KOHLER公式サイトへ。</h2></div>
            </div>
            <div class="nstm-gateways">
              <?php
              $gateways = array(
                  array('01', '商品情報', 'キッチン、洗面、浴室などの製品を見る', 'https://kohler.jp/products/'),
                  array('02', 'カタログ', '最新の製品カタログをオンラインで見る', 'https://kohler.jp/product-catalogue/'),
                  array('03', 'ショールーム', '展示製品と予約方法を確認する', 'https://kohler.jp/showroom/'),
              );
              foreach ($gateways as $item) : ?>
                <a class="nstm-gateway" href="<?php echo esc_url($item[3]); ?>" target="_blank" rel="noopener"><span class="nstm-gateway__mark"><?php echo esc_html($item[0]); ?></span><h3><?php echo esc_html($item[1]); ?></h3><p><?php echo esc_html($item[2]); ?></p><span class="nstm-gateway__link">KOHLER公式サイトで見る</span></a>
              <?php endforeach; ?>
            </div>
          </div>
        </section>

        <section class="nstm-group" id="company">
          <div class="nstm-group__image" role="img" aria-label="検査記録と精密測定の様子"></div>
          <div class="nstm-group__copy">
            <span class="nstm-kicker">会社について</span>
            <h2>輸入して終わらない。<br>日本で使うところまで支える。</h2>
            <p>日鉄物産マテックスは、KOHLERの日本正規輸入代理店です。製品を輸入・販売するだけでなく、日本の現場で必要になる仕様確認、施工方法のご案内、修理・部品供給まで対応します。</p>
            <p>2004年設立の日鉄物産株式会社100％子会社として、ISO 9001・ISO 14001に基づく品質・環境マネジメントに取り組んでいます。</p>
            <div class="nstm-group__principles"><div class="nstm-group__principle"><span>国内で製品を確認する</span><span>検品</span></div><div class="nstm-group__principle"><span>施工・修理の知見を共有する</span><span>改善</span></div><div class="nstm-group__principle"><span>正規ルートで供給と保守を行う</span><span>継続</span></div></div>
            <p class="nstm-image-note">※ 写真はイメージです。</p>
          </div>
        </section>

        <section class="nstm-section nstm-contact" id="contact">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">お問い合わせ</span>
              <div><h2 class="nstm-section__heading">ご相談内容に合う窓口を<br>お選びください。</h2><p class="nstm-section__intro">製品の採用・仕様確認から修理まで、KOHLER営業部が承ります。お急ぎの場合は、平日9:00〜17:15にお電話でもお問い合わせいただけます。</p></div>
            </div>
            <div class="nstm-contact__grid">
              <a class="nstm-contact-card" href="https://kohler-nst.jp/contact/products"><span class="nstm-contact-card__number">01</span><h3>プロジェクトでの<br>採用を検討している</h3><p>製品選定、仕様、納まり、見積など</p><span>製品について相談する</span></a>
              <a class="nstm-contact-card" href="https://kohler-nst.jp/contact/products"><span class="nstm-contact-card__number">02</span><h3>仕様・図面・<br>技術資料が必要</h3><p>品番、組み合わせ、施工方法など</p><span>仕様について問い合わせる</span></a>
              <a class="nstm-contact-card" href="https://kohler-nst.jp/contact/buy"><span class="nstm-contact-card__number">03</span><h3>購入先・納期を<br>確認したい</h3><p>販売店のご案内、国内在庫、輸入納期など</p><span>購入について問い合わせる</span></a>
              <a class="nstm-contact-card" href="https://kohler-nst.jp/contact/maintenance"><span class="nstm-contact-card__number">04</span><h3>修理・部品・<br>メンテナンス</h3><p>製品品番、設置状況、不具合の症状など</p><span>修理について相談する</span></a>
            </div>
          </div>
        </section>
      </main>

      <footer class="nstm-footer"><div class="nstm-container nstm-footer__inner"><span>日鉄物産マテックス株式会社 KOHLER営業部</span><span>〒136-0082 東京都江東区新木場1-1-7　TEL 03-6311-6401</span><span>※ 掲載写真はすべてイメージです。</span><span>© NIPPON STEEL TRADING MATEX CO., LTD.</span></div></footer>
    </div>
    <?php
}
