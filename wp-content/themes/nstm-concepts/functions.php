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
    $image_uri = get_template_directory_uri() . '/assets/images';
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
            <a href="#promise">国内での対応</a>
            <a href="#lab">国内ラボ・通水検証</a>
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
              <h1 class="nstm-hero__title">KOHLER製品の<br>輸入・検品から、<br>修理まで承ります。</h1>
              <p class="nstm-hero__lead">日鉄物産マテックス株式会社</p>
              <a class="nstm-button" href="#contact">プロジェクトについて相談する</a>
            </div>
            <div class="nstm-hero__proof"><span>正規輸入</span><span>国内での検品</span><span>施工・修理のご相談</span><span>日本全国のメンテナンス網</span></div>
          </div>
        </section>

        <?php if ($is_a) : ?>
          <section class="nstm-section nstm-a-concerns" id="promise">
            <div class="nstm-container">
              <div class="nstm-a-concerns__head">
                <h2 class="nstm-section__heading">輸入品だからこそ、こんな不安はありませんか？</h2>
                <p>国内での検品から施工・修理まで、日本の現場で必要になる対応を行います。</p>
              </div>
              <div class="nstm-a-concerns__grid">
                <?php
                $concerns = array(
                    array('receive', '初期不良が心配', '国内倉庫で製品を開梱し、外観や状態を確認します。'),
                    array('fit', '日本の設備に合うか不安', '配管や規格など、国内での使用条件に合うか確認します。'),
                    array('install', '施工方法が分からない', '施工方法をご案内し、必要な技術資料を提供します。'),
                    array('repair', '故障時の修理が不安', '修理の受付から部品供給、現地対応まで承ります。'),
                );
                foreach ($concerns as $index => $item) : ?>
                  <article class="nstm-a-concern nstm-a-concern--<?php echo esc_attr($item[0]); ?>">
                    <span>0<?php echo esc_html($index + 1); ?></span>
                    <div><h3><?php echo esc_html($item[1]); ?></h3><p><?php echo esc_html($item[2]); ?></p></div>
                  </article>
                <?php endforeach; ?>
              </div>
            </div>
          </section>

          <section class="nstm-section nstm-stats nstm-a-evidence">
            <div class="nstm-container">
              <div class="nstm-a-evidence__title"><div><span>国内の対応体制</span><h2>国内でのサポート体制</h2></div><p>製品の輸入、国内での検品、保証、修理まで、一貫して対応します。</p></div>
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
              <div class="nstm-a-evidence__photos">
                <figure><img src="<?php echo esc_url($image_uri . '/inspection-caliper.webp'); ?>" alt="部品の寸法確認イメージ"><figcaption>寸法・外観の確認</figcaption></figure>
                <figure><img src="<?php echo esc_url($image_uri . '/hero-dark.webp'); ?>" alt="水栓の通水確認イメージ"><figcaption>通水状態の確認</figcaption></figure>
                <figure><img src="<?php echo esc_url($image_uri . '/warehouse-inspection.webp'); ?>" alt="国内倉庫での受入検品イメージ"><figcaption>国内倉庫での受入検品</figcaption></figure>
                <figure><img src="<?php echo esc_url($image_uri . '/maintenance-repair.webp'); ?>" alt="水栓修理のイメージ"><figcaption>修理・部品対応</figcaption></figure>
              </div>
              <p class="nstm-provisional">※ メンテナンス網は2026年9月現在。保証期間は製品により異なります。写真はイメージです。</p>
            </div>
          </section>

          <section class="nstm-lab nstm-lab--a" id="lab">
            <div class="nstm-container nstm-lab__inner">
              <div class="nstm-lab__copy">
                <span class="nstm-lab__badge">プロジェクトサポート｜案件限定</span>
                <h2>国内ラボで、<br>通水検証を行います。</h2>
                <p>ホテルやレジデンスなどのプロジェクトでは、ご相談に応じて国内ラボで通水検証を行うことが可能です。実施内容は、製品や案件の条件に合わせて個別に調整します。</p>
                <div class="nstm-lab__facts"><span>対象：プロジェクト案件</span><span>実施：ご相談に応じて</span><span>内容：案件ごとに個別調整</span></div>
                <small class="nstm-image-note">※ 写真はイメージです。</small>
              </div>
            </div>
          </section>

          <section class="nstm-section nstm-process nstm-process--a" id="flow">
            <div class="nstm-container">
              <div class="nstm-process__head"><div><span>納入までの流れ</span><h2>KOHLER製品が<span class="nstm-sp-break"></span>日本の現場に届くまで</h2></div><p>輸入した製品は、国内で開梱・検品し、確認した内容を記録してから出荷します。</p></div>
              <div class="nstm-process__grid">
                <?php
                $process = array(
                    array('01', '日本へ輸入', 'cargo-port.webp'),
                    array('02', '受入・開梱', 'warehouse-inspection.webp'),
                    array('03', '検品・通水確認', 'inspection-caliper.webp'),
                    array('04', '記録・注意事項の確認', 'technical-drawing.webp'),
                    array('05', '出荷', 'warehouse-inspection.webp'),
                );
                foreach ($process as $item) : ?>
                  <article class="nstm-process-card"><div><span><?php echo esc_html($item[0]); ?></span><h3><?php echo esc_html($item[1]); ?></h3></div><img src="<?php echo esc_url($image_uri . '/' . $item[2]); ?>" alt=""></article>
                <?php endforeach; ?>
              </div>
              <p class="nstm-image-note">※ 写真はイメージです。</p>
            </div>
          </section>

          <section class="nstm-a-dual" id="support">
            <article class="nstm-a-dual__panel nstm-a-dual__panel--quality">
              <div><span>正規輸入品への対応</span><h2>品質の約束</h2><p>国内で受入検品を行い、使用上の注意事項を記録します。保証、部品供給、修理のご相談にも対応します。</p></div>
            </article>
            <article class="nstm-a-dual__panel nstm-a-dual__panel--project" id="projects">
              <div><span>ホテル・レジデンスなど</span><h2>プロジェクト<br>サポート</h2><p>ホテルやレジデンスなどの案件では、ご相談に応じて製品選定、価格・納期の調整、納まり検討、通水検証、施工支援が可能です。対応内容は案件ごとに調整します。</p></div>
            </article>
          </section>
        <?php else : ?>
          <section class="nstm-section nstm-b-assurance" id="promise">
            <div class="nstm-container nstm-b-assurance__layout">
              <div class="nstm-b-assurance__statement"><span>日鉄物産マテックスの役割</span><h2>KOHLER製品を、<br>日本で安心して<br>使い続けるために。</h2><p>輸入・検品、設計・施工支援、保証・修理を一つの窓口で承ります。</p></div>
              <div class="nstm-b-assurance__services">
                <article><span class="nstm-b-assurance__icon">検</span><h3>正規輸入・<br>受入検品</h3><p>国内倉庫で製品を開梱し、外観や状態を確認してから出荷します。</p></article>
                <article><span class="nstm-b-assurance__icon">設</span><h3>製品選定・<br>施工支援</h3><p>用途や納まりに合わせた製品選定と、施工方法のご相談に対応します。</p></article>
                <article><span class="nstm-b-assurance__icon">修</span><h3>保証・修理・<br>部品供給</h3><p>正規輸入品には製品ごとの保証期間を設け、修理と部品購入も受け付けています。</p></article>
                <article><span class="nstm-b-assurance__icon">網</span><h3>全国<br>メンテナンス</h3><p>39都道府県64社のサービスパートナーと連携し、全国でメンテナンスに対応しています。</p></article>
              </div>
            </div>
          </section>

          <section class="nstm-lab nstm-lab--b" id="lab">
            <div class="nstm-container nstm-lab__inner">
              <div class="nstm-lab__visual" role="img" aria-label="水栓の通水検証イメージ"><span>国内ラボ／通水検証</span></div>
              <div class="nstm-lab__copy">
                <span class="nstm-lab__badge">プロジェクトサポート｜案件限定</span>
                <h2>国内ラボでの<br>通水検証も、<br>ご相談ください。</h2>
                <p>ホテルやレジデンスなどの案件を対象に、ご相談に応じて実施します。検証する製品や内容は、案件の条件を確認したうえで個別に調整します。</p>
                <dl class="nstm-lab__details"><div><dt>対象</dt><dd>プロジェクト案件</dd></div><div><dt>実施</dt><dd>ご相談に応じて</dd></div><div><dt>内容</dt><dd>案件ごとに個別調整</dd></div></dl>
                <small class="nstm-image-note">※ 写真はイメージです。</small>
              </div>
            </div>
          </section>

          <section class="nstm-section nstm-projects nstm-b-projects" id="projects">
            <div class="nstm-container">
              <div class="nstm-section__head"><span class="nstm-section__number">プロジェクト対応</span><div><h2 class="nstm-section__heading">用途と工程に合わせ、<br>KOHLER製品の採用を<br>支援します。</h2></div></div>
              <div class="nstm-projects__layout">
                <article class="nstm-project-feature"><div class="nstm-project-feature__copy"><small>ホテル・レジデンス</small><h3>選定から納入まで、<br>案件別に対応します</h3><p>ご相談内容に応じて、空間の意匠、必要数量、工期、施工条件を確認し、採用に必要な情報を整理します。</p><small class="nstm-image-note">※ 写真はイメージです。</small></div></article>
                <div class="nstm-project-list">
                  <article class="nstm-project-card"><small>設計段階</small><strong>製品選定・仕様確認</strong><span>意匠、必要な機能、国内での使用条件を確認し、候補製品をご案内します。</span></article>
                  <article class="nstm-project-card"><small>調達段階</small><strong>価格・納期の調整</strong><span>数量と希望納期を確認し、価格と納入時期を調整します。</span></article>
                  <article class="nstm-project-card"><small>施工段階</small><strong>納まり・施工支援</strong><span>承認図や施工資料をご案内し、納まりと施工方法のご相談に対応します。</span></article>
                </div>
              </div>
            </div>
          </section>

          <section class="nstm-section nstm-process nstm-process--b" id="flow">
            <div class="nstm-container">
              <div class="nstm-process__head"><div><span>納入までの流れ</span><h2>KOHLER製品が<span class="nstm-sp-break"></span>日本の現場に届くまで</h2></div><p>輸入した製品は、国内で開梱・検品し、確認した内容を記録してから出荷します。</p></div>
              <div class="nstm-process__grid">
                <?php foreach (array(
                    array('01', '日本へ輸入', 'cargo-port.webp'),
                    array('02', '受入・開梱', 'warehouse-inspection.webp'),
                    array('03', '検品・通水確認', 'inspection-caliper.webp'),
                    array('04', '記録・注意事項の確認', 'technical-drawing.webp'),
                    array('05', '出荷', 'warehouse-inspection.webp'),
                ) as $item) : ?>
                  <article class="nstm-process-card"><div><span><?php echo esc_html($item[0]); ?></span><h3><?php echo esc_html($item[1]); ?></h3></div><img src="<?php echo esc_url($image_uri . '/' . $item[2]); ?>" alt=""></article>
                <?php endforeach; ?>
              </div>
              <p class="nstm-image-note">※ 写真はイメージです。</p>
            </div>
          </section>

          <section class="nstm-b-dual" id="support">
            <article><img src="<?php echo esc_url($image_uri . '/inspection-caliper.webp'); ?>" alt="部品の寸法確認イメージ"><div><span>正規輸入品への対応</span><h2>品質の約束</h2><p>国内で受入検品を行い、使用上の注意事項を記録します。保証、部品供給、修理のご相談にも対応します。</p></div></article>
            <article><div><span>ホテル・レジデンスなど</span><h2>プロジェクト<br>サポート</h2><p>ホテルやレジデンスなどの案件では、ご相談に応じて製品選定、価格・納期の調整、納まり検討、通水検証、施工支援が可能です。対応内容は案件ごとに調整します。</p></div><img src="<?php echo esc_url($image_uri . '/technical-drawing.webp'); ?>" alt="設計図面を確認するイメージ"></article>
          </section>
        <?php endif; ?>

        <section class="nstm-section">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">商品を探す</span>
              <div><h2 class="nstm-section__heading">製品情報は、<br>KOHLER公式サイトで<br>ご覧いただけます。</h2></div>
            </div>
            <div class="nstm-gateways">
              <?php
              $gateways = array(
                  array('01', '商品情報', 'キッチン、洗面、浴室などの製品情報を見る', 'https://kohler.jp/products/'),
                  array('02', 'カタログ', '製品カタログをオンラインで閲覧する', 'https://kohler.jp/product-catalogue/'),
                  array('03', 'ショールーム', '展示製品と来場予約について確認する', 'https://kohler.jp/showroom/'),
              );
              foreach ($gateways as $item) : ?>
                <a class="nstm-gateway" href="<?php echo esc_url($item[3]); ?>" target="_blank" rel="noopener"><span class="nstm-gateway__mark"><?php echo esc_html($item[0]); ?></span><h3><?php echo esc_html($item[1]); ?></h3><p><?php echo esc_html($item[2]); ?></p><span class="nstm-gateway__link">KOHLER公式サイトで確認する</span></a>
              <?php endforeach; ?>
            </div>
          </div>
        </section>

        <section class="nstm-group" id="company">
          <div class="nstm-group__image" role="img" aria-label="検査記録と精密測定の様子"></div>
          <div class="nstm-group__copy">
            <span class="nstm-kicker">会社について</span>
            <h2>輸入から、<br>施工・修理まで。</h2>
            <p>日鉄物産マテックスは、KOHLERの日本正規輸入代理店です。製品の輸入・販売に加え、国内での仕様確認、施工方法のご案内、修理・部品供給を行っています。</p>
            <p>当社は2004年に設立され、日鉄物産株式会社が全株式を保有しています。ISO 9001・ISO 14001に基づき、品質と環境のマネジメントに取り組んでいます。</p>
            <div class="nstm-group__principles"><div class="nstm-group__principle"><span>国内で製品の状態を確認</span><span>受入検品</span></div><div class="nstm-group__principle"><span>施工・修理の情報を蓄積</span><span>記録</span></div><div class="nstm-group__principle"><span>正規ルートで供給・保守</span><span>継続</span></div></div>
            <p class="nstm-image-note">※ 写真はイメージです。</p>
          </div>
        </section>

        <section class="nstm-section nstm-contact" id="contact">
          <div class="nstm-container">
            <div class="nstm-section__head">
              <span class="nstm-section__number">お問い合わせ</span>
              <div><h2 class="nstm-section__heading">ご相談内容に合う<br>窓口をお選びください</h2><p class="nstm-section__intro">製品の採用、仕様確認、購入、修理に関するご相談をKOHLER営業部が承ります。電話受付は平日9:00〜17:15です。</p></div>
            </div>
            <div class="nstm-contact__grid">
              <a class="nstm-contact-card" href="https://kohler-nst.jp/contact/products"><span class="nstm-contact-card__number">01</span><h3>プロジェクトでの<br>採用を相談したい</h3><p>製品選定、仕様、納まり、見積など</p><span>採用について相談する</span></a>
              <a class="nstm-contact-card" href="https://kohler-nst.jp/contact/products"><span class="nstm-contact-card__number">02</span><h3>製品仕様・図面・<br>施工資料を確認したい</h3><p>品番、製品の組み合わせ、施工方法など</p><span>製品仕様について問い合わせる</span></a>
              <a class="nstm-contact-card" href="https://kohler-nst.jp/contact/buy"><span class="nstm-contact-card__number">03</span><h3>購入先・在庫・納期を<br>確認したい</h3><p>販売店のご案内、国内在庫、輸入品の納期など</p><span>購入について問い合わせる</span></a>
              <a class="nstm-contact-card" href="https://kohler-nst.jp/contact/maintenance"><span class="nstm-contact-card__number">04</span><h3>修理・交換部品<br>について相談したい</h3><p>製品品番、設置状況、不具合の症状など</p><span>修理について問い合わせる</span></a>
            </div>
          </div>
        </section>
      </main>

      <footer class="nstm-footer"><div class="nstm-container nstm-footer__inner"><span>日鉄物産マテックス株式会社 KOHLER営業部</span><span>〒136-0082 東京都江東区新木場1-1-7　TEL 03-6311-6401</span><span>※ 掲載写真はすべてイメージです。</span><span>© NIPPON STEEL TRADING MATEX CO., LTD.</span></div></footer>
    </div>
    <?php
}
