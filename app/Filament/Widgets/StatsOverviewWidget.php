<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Modules\Blog\Models\Post;
use Modules\Blog\Models\CaseStudy;
use Modules\Website\Models\FormSubmission;
use Modules\Website\Models\Form;
use Modules\Website\Models\Page;
use Modules\Website\Models\Contact;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        // Get newsletter form ID
        $newsletterForm = Form::where('slug', 'newsletter-signup')->first();
        $subscriberCount = $newsletterForm 
            ? FormSubmission::where('form_id', $newsletterForm->id)->count()
            : 0;

        // Get form submissions from last 7 days
        $recentSubmissions = FormSubmission::where('created_at', '>=', now()->subDays(7))->count();
        
        // Get published content counts
        $publishedPosts = Post::where('status', 'published')->count();
        $publishedCaseStudies = CaseStudy::where('status', 'published')->count();
        $publishedPages = Page::where('status', 'published')->count();
        
        // Get pending contacts
        $pendingContacts = Contact::where('status', 'new')->count();

        return [
            Stat::make('Newsletter Subscribers', $subscriberCount)
                ->description('Total newsletter signups')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success')
                ->chart([7, 12, 15, 18, 22, 26, $subscriberCount]),

            Stat::make('Form Submissions', $recentSubmissions)
                ->description('Last 7 days')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info')
                ->chart([3, 5, 4, 7, 6, 8, $recentSubmissions]),

            Stat::make('Published Content', $publishedPosts + $publishedCaseStudies)
                ->description($publishedPosts . ' posts, ' . $publishedCaseStudies . ' case studies')
                ->descriptionIcon('heroicon-m-document-duplicate')
                ->color('warning'),

            Stat::make('Active Pages', $publishedPages)
                ->description('Published website pages')
                ->descriptionIcon('heroicon-m-globe-alt')
                ->color('primary'),

            Stat::make('Pending Contacts', $pendingContacts)
                ->description('Awaiting response')
                ->descriptionIcon('heroicon-m-envelope')
                ->color($pendingContacts > 0 ? 'danger' : 'success'),

            Stat::make('Featured Content', 
                Post::where('is_featured', true)->where('status', 'published')->count() +
                CaseStudy::where('is_featured', true)->where('status', 'published')->count()
            )
                ->description('Highlighted on homepage')
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),
        ];
    }
}