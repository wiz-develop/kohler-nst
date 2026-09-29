# kohler-nst

日鉄物産マテックス様サイトの管理用リポジトリです。

## ブランチ運用

| ブランチ | 用途 |
| --- | --- |
| `origin` | 現行サイトの保全・管理 |
| `test` | テストサイト |
| `main` | 本番サイト |

## 更新フロー

1. 現行サイトの初回取り込みは `origin` で行う
2. テスト環境で確認する変更は `test` へ反映する
3. 確認済みの変更のみ `main` へマージする

`origin` はブランチ名とGitリモート名の両方に使われます。リモート上の `origin` ブランチは `origin/origin` と表示されます。

## サーバー構成

現行サイトとリニューアルサイトの切り替え計画は [docs/server-environment.md](docs/server-environment.md) を参照してください。

リニューアルのA案・B案の方針は [docs/design-concepts.md](docs/design-concepts.md) を参照してください。
