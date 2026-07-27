<x-admin-layout>
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="mb-0">Marketplace Dashboard</h3>
                <p class="text-sm text-muted">Overview of your marketplace statistics and actions.</p>
            </div>
        </div>

        <div class="row mb-4">
            
            <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-secondary text-uppercase fs-7 mb-1">Total Ads</h6>
                                <h3 class="mb-0 font-weight-bold">{{ $totalAds }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-secondary text-uppercase fs-7 mb-1">Listed Ads</h6>
                                <h3 class="mb-0 font-weight-bold">{{ $listedAds }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-3 mb-md-0">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-secondary text-uppercase fs-7 mb-1">Approved Ads</h6>
                                <h3 class="mb-0 font-weight-bold">{{ $approvedAds }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-secondary text-uppercase fs-7 mb-1">Rejected Ads</h6>
                                <h3 class="mb-0 font-weight-bold">{{ $rejectedAds }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mb-4">
            
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-transparent">
                        <h6 class="mb-0">Quick Actions</h6>
                    </div>
                    <div class="card-body d-grid gap-2">
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">
                            Categories
                        </a>
                        <a href="{{ route('models.index') }}" class="btn btn-outline-primary">
                            Models
                        </a>
                        <a href="{{ route('listed.index') }}" class="btn btn-warning">
                            Listes Ads
                        </a>
                        <a href="{{ route('post_ads.approved') }}" class="btn btn-success">
                            Approved Ads
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-transparent">
                        <h6 class="mb-0">Marketplace Statistics</h6>
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <div class="row w-100 text-center">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <h3 class="font-weight-bold mb-0">{{ $totalUsers }}</h3>
                                <span class="text-muted text-sm">Users</span>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <h3 class="font-weight-bold mb-0">{{ $totalCategories }}</h3>
                                <span class="text-muted text-sm">Categories</span>
                            </div>
                            <div class="col-md-4">
                                <h3 class="font-weight-bold mb-0">{{ $totalModels }}</h3>
                                <span class="text-muted text-sm">Models</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-transparent">
                        <h6 class="mb-0">Recent Pending Ads</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-3">Title</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentlistedAds as $ad)
                                    <tr>
                                        <td class="ps-3">{{ $ad->title }}</td>
                                        <td>{{ $ad->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-muted py-3">
                                            No pending ads found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-transparent">
                        <h6 class="mb-0">Recently Approved Ads</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-3">Title</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentApprovedAds as $ad)
                                    <tr>
                                        <td class="ps-3">{{ $ad->title }}</td>
                                        <td>{{ $ad->updated_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-muted py-3">
                                            No approved ads found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-admin-layout>