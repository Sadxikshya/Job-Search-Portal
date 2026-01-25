<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CV - {{ $user->first_name }} {{ $user->last_name }}</title>
    <style>

        @page {
            margin: 0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
            background: #fff;
        }
        
        .container {
            padding: 30px 40px;
        }
        
        /* Header Section */
        .header {
            background-color: #fff; /* NO gradients */
            color: #333;
            padding: 30px;
            text-align: center;
        }

        
        .header h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }
        
        .header .title {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 15px;
        }
        
        .header .contact-row {
            font-size: 11px;
            margin-top: 10px;
        }
        
        .header .contact-row span {
            margin: 0 10px;
        }
        
        /* Section Styles */
        .section {
            margin-bottom: 25px;
        }
        
        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #667eea;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        
        /* Profile/About Section */
        .about-text {
            text-align: justify;
            color: #555;
            line-height: 1.7;
        }
        
        /* Info Grid */
        .info-grid {
            width: 100%;
            border-collapse: collapse;
        }
        
        .info-grid td {
            padding: 8px 0;
            vertical-align: top;
        }
        
        .info-grid .label {
            font-weight: bold;
            color: #333;
            width: 140px;
        }
        
        .info-grid .value {
            color: #333;
        }
        
        /* Skills Section */
        .skills-container {
            margin-top: 10px;
        }
        
        .skill-tag {
            display: inline-block;
            background: #fff;
            color: #333;
            padding: 6px 12px;
            margin: 3px 5px 3px 0;
            border-radius: 15px;
            font-size: 11px;
            border: 1px solid #dde4ff;
        }
        
        /* Experience Level Badge */
        .experience-badge {
            display: inline-block;
            background: #fff;
            color: #333;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
        }
        
        /* Contact Info Box */
        .contact-box {
            background: #f8f9ff;
            border: 1px solid #e0e5ff;
            border-radius: 8px;
            padding: 15px;
            margin-top: 10px;
        }
        
        .contact-item {
            margin-bottom: 10px;
        }
        
        .contact-item:last-child {
            margin-bottom: 0;
        }
        
        .contact-icon {
            display: inline-block;
            width: 20px;
            color: #333;
            font-weight: bold;
        }
        
        /* Footer */
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            text-align: center;
            font-size: 10px;
            color: #999;
        }
        
        /* Two Column Layout */
        .two-columns {
            width: 100%;
        }
        
        .two-columns td {
            width: 50%;
            vertical-align: top;
            padding-right: 15px;
        }
        
        .two-columns td:last-child {
            padding-right: 0;
            padding-left: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>{{ strtoupper($user->first_name) }} {{ strtoupper($user->last_name) }}</h1>
            <div class="title">{{ $profile->education }}</div>
            <div class="contact-row">
                <span>{{ $user->email }}</span>
                <span>|</span>
                <span>{{ $profile->phone }}</span>
                <span>|</span>
                <span>{{ $profile->address }}</span>
            </div>
        </div>

        <!-- About/Profile Section -->
        @if($profile->bio)
        <div class="section">
            <div class="section-title">Professional Summary</div>
            <p class="about-text">{!! $profile->bio !!}</p>
        </div>
        @endif

        <!-- Professional Details -->
        <div class="section">
            <div class="section-title">Professional Details</div>
            <table class="info-grid">
                <tr>
                    <td class="label">Education:</td>
                    <td class="value">{{ $profile->education }}</td>
                </tr>
                <tr>
                    <td class="label">Experience Level:</td>
                    <td class="value">
                        <span class="experience-badge">
                            @switch($profile->experience_level)
                                @case('entry')
                                    Entry Level (0-1 years)
                                    @break
                                @case('junior')
                                    Junior (1-3 years)
                                    @break
                                @case('mid')
                                    Mid-Level (3-5 years)
                                    @break
                                @case('senior')
                                    Senior (5+ years)
                                    @break
                                @default
                                    {{ ucfirst($profile->experience_level) }}
                            @endswitch
                        </span>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Skills Section -->
        @if($profile->skills)
        <div class="section">
            <div class="section-title">Skills & Expertise</div>
            <ul class="skills-list">
                @foreach(explode(',', $profile->skills) as $skill)
                    <li>{{ trim($skill) }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <!-- Contact Information -->
        <div class="section">
            <div class="section-title">Contact Information</div>
            <div class="contact-box">
                <div class="contact-item">
                    <span class="contact-icon">@</span>
                    <strong>Email:</strong> {{ $user->email }}
                </div>
                <div class="contact-item">
                    <span class="contact-icon">#</span>
                    <strong>Phone:</strong> {{ $profile->phone }}
                </div>
                <div class="contact-item">
                    <span class="contact-icon">*</span>
                    <strong>Address:</strong> {{ $profile->address }}
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            Generated on {{ now()->format('F d, Y') }} | CV of {{ $user->first_name }} {{ $user->last_name }}
        </div>
    </div>
</body>
</html>
