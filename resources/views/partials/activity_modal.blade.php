<div class="modal" id="activityModal">
    <div class="modal-content">
        <h2>アクティビティを追加</h2>

        <form action="{{ route('items.store',$trip) }}" method="POST">
            @csrf
            <div class="input-row">

                <div>
                    <label for="time">時間</label>
                    <input type="time" name="time">
                </div>

                <div>
                    <label for="location">場所</label>
                    <input type="text" name="location">
                </div>

            </div>

            <label for="activity_titke">アクティビティ</label>
            <input type="text" name="activity_title" placeholder="例：シュノーケリング体験">

            <button class="submit-btn">追加する</button>
        </form>
    </div>
</div>
