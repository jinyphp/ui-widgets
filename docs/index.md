# Widgets
지니UI 위젯은 라라벨 기반에서 데이터 중심의 컴포넌트를 손쉽게 관리할 수 있습니다.

## 일반 컴포넌트와의 차이점
일반적으로 컴포넌트는 복잡한 UI를 단순화 하여 여러곳에서 재사용을 하는 목적으로 설계를 합니다.  
하지만, 이러한 컴포넌트들은 안에 데이터를 가지고 있으며, 다양한 데이터 유형에 따라서 컴포넌트를 재구현 해야 하는 문제점들이 존재합니다.  

반면에, 지니UI의 위젯은 컴포넌트와 외부의 json 데이터를 한세트로 결합을 하여 데이터 기반의 컴포넌트를 구현할 수 있습니다.

## 데이터의 위치
지니UI 위젯의 데이터는 라라벨의 `resources/widgets` 폴더안에 존재합니다. 직접 코드로 수정이 가능하며, 지니UI의 디자인토글(`Alt+t`)를 통하여 손쉽게 수정이 가능합니다.

## 위젯 삽입
지니UI 위젯은 라라벨의 컴포넌트 기술과 라이브와이어를 기반으로 합니다. Blade 템플릿에서 다음과 같이 코드를 삽입할 수 있습니다.

```php
@livewire('WidgetHero-Heading', [
    'filename' => "about_hero_text1"
])
```

`filename`은 위젯에서 참고할 json 데이터 파일의 이름입니다. 확장자는 사용하지 않습니다.

## 커스텀 디자인 설정
위젯을 사용할때, 커스텀 디자인을 적용할 수 있습니다. 라이브와이어를 호출할때 매개변수로 이를 변경할 수 있습니다.

* viewList: 화면을 출력하는 blade 뷰 입니다.
* viewForm: 데이터를 입력받는 blade 폼 입니다.


## 공용 위젯
지니UI의 위젯은 크게 2가지로 구분 합니다. 단일 데이터를 기반으로 화면을 구현하는 `Hero` 스타일과 여러 데이터를 배열로 목록화 하여 출력하는 `List` 타입입니다.

### Hero 스타일의 확장 위젯
* WidgetHero
* WidgetHero-Heading
* WidgetHero-Buttons

* WidgetCard
* WidgetCard-Left
* WidgetCard-Right

### List 스타일의 확장 위젯
* WidgetList
* WidgetList-Faq

* WidgetTable

* WidgetGrid
* WidgetGrid-Avatas
* WidgetGrid-Images

* WidgetCarousel
