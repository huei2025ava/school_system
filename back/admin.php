<div class="h-100 overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">管理者帳號管理</h3>
        <button type="button" class="btn btn-success fw-bold shadow-sm" 
                onclick="op('#cover','#cvr','modal/<?= $do ?>.php?table=<?= $do ?>')">
            <i class="bi bi-plus-lg"></i> 新增管理者帳號
        </button>
    </div>

    <form method="post" action="./api/edit.php?table=<?= $do ?>">
        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="45%" class="ps-4">帳號</th>
                            <th width="45%">密碼</th>
                            <th width="10%" class="text-center pe-4">刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rows = $Admin->all();
                        foreach ($rows as $row):
                        ?>
                        <tr>
                            <td class="ps-4">
                                <input type="text" name="acc[<?= $row['id']; ?>]" value="<?= $row['acc']; ?>" class="form-control">
                            </td>
                            <td>
                                <input type="password" name="pw[<?= $row['id']; ?>]" value="<?= $row['pw']; ?>" class="form-control">
                            </td>
                            <td class="text-center pe-4">
                                <div class="form-check d-flex justify-content-center">
                                    <input type="checkbox" name="del[]" value="<?= $row['id']; ?>" class="form-check-input border-danger">
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-3 mt-5 pb-5">
            <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold shadow">修改確定</button>
            <button type="reset" class="btn btn-outline-secondary btn-lg px-5 fw-bold">重置</button>
        </div>
    </form>
</div>