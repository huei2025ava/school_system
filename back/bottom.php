<div class="h-100 overflow-auto">
    <div class="mb-4">
        <h3 class="fw-bold mb-0 text-center">頁尾版權資料管理</h3>
    </div>

    <form method="post" action="./api/edit_data.php?table=<?= $do ?>">
        <div class="card shadow-sm border-0 col-lg-8 mx-auto">
            <div class="card-body p-5">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <label for="bottom" class="form-label fs-5 fw-bold mb-0">頁尾版權資料：</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="bottom" id="bottom" value="<?= $Bottom->find(1)['bottom'] ?>" 
                               class="form-control form-control-lg border-primary">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-3 mt-5 pb-5">
            <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold shadow">修改確定</button>
            <button type="reset" class="btn btn-outline-secondary btn-lg px-5 fw-bold">重置</button>
        </div>
    </form>
</div>
