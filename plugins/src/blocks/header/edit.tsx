import { useBlockProps } from "@wordpress/block-editor";

export default function Edit() {
	return (
		<header
			{...useBlockProps({
				className:
					"w-full border-b border-neutral-25 py-4"
			})}
		>
			<div className="max-w-container mx-auto flex justify-between">
				<span className="font-display text-2xl">Logo</span>
				<nav className="flex gap-6 font-body">
					<a>Home</a>
					<a>Shop</a>
					<a>Contact</a>
				</nav>
			</div>
		</header>
	);
}
